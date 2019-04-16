<?php
App::uses('AppController', 'Controller');
class PostelcodesController extends AppController {

    /**
     * 郵便番号CSVをインポート、postelcodesテーブルを書き換える
     * インポートCSV保存先
     * 文字コード書き換え前CSV -> webroot/files/csvs
     * 文字コード書き換え後CSV -> webroot/files/csvs/encoded
     */
    public function index() {
        if ($this->request->is('post')) {
            $this->Postelcode->create();
            $csv = $this->request->data['Postelcodes']['csvfile'];

            //フォルダ保存先パス
            $csv_save_path =  WWW_ROOT . 'files/csvs';
            $encoded_path = WWW_ROOT . 'files/csvs/encoded';
            $tmp_file = $csv['tmp_name'];

            //フォルダの保存処理
            // ファイル有無のチェック
            if (file_exists($tmp_file)) {

                // 現在の年月日時間を取得
                $date_time = date("Y_m_d_H_i");

                // 移動後のファイルパス
                $file_rename = $csv_save_path . DS . $date_time . '_' . $csv['name'];
                
                // アップロードしたファイルを該当フォルダへ移動
                move_uploaded_file($tmp_file, $file_rename);

                // CSVファイルの中身をUTF-8に書き換えたあとのCSVファイル保存先
                $file_encoded = $encoded_path . DS . $date_time . '_' . $csv['name'];
                $cmd = "nkf -w {$file_rename} > {$file_encoded}";
                
                // コマンド実行
                exec($cmd);

                /**
                 * 実行するSQL
                 * $delete_sql -> postelcodesテーブルの初期化
                 * $data_sql = アップロードしたCSVファイルをDBへインポート
                 */
                $delete_sql = 'TRUNCATE postelcodes';
                $data_sql = "LOAD DATA LOCAL INFILE '{$file_encoded}'
                    INTO TABLE postelcodes FIELDS TERMINATED BY ','
                    OPTIONALLY ENCLOSED BY '\"'
                    ESCAPED BY ''
                    LINES STARTING BY ''
                    TERMINATED BY '\r\n'
                    ( jiscode, zipcode_old, zipcode, pref_kana, city_kana, street_kana, pref, city, street, flag1, flag2, flag3, flag4, flag5, flag6 )";

                // クエリの実行
                $this->Postelcode->query($delete_sql);
                $this->Postelcode->query($data_sql);

                $this->Flash->set(__('OK. CSVs changed complete.', true));

            } else {
                $this->Flash->set(__('Failed to import data. Please, try again.', true));
            }
        }
    }
}
