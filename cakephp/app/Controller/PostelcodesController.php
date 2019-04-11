<?php
App::uses('AppController', 'Controller');
class PostelcodesController extends AppController {

    public function index() {
        if ($this->request->is('post')) {
            // debug($this->request->data);
            // exit;
            $this->Postelcode->create();
            $csv = $this->request->data['Postelcodes']['csvfile'];
            //フォルダ保存先パス

            $csv_save_path =  WWW_ROOT . 'files/csvs';
            $encoded_path = WWW_ROOT . 'files/csvs/encoded';
            $tmp_file = $csv['tmp_name'];


            //フォルダの保存処理
            // まずファイルが存在するかどうかチェック
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
                exec($cmd);

                // テーブルの初期化
                $delete_sql = 'TRUNCATE postelcodes';
                // アップローしたCSVファイルをDBインポート
                $data_sql = "LOAD DATA LOCAL INFILE '{$file_encoded}'
                    INTO TABLE postelcodes FIELDS TERMINATED BY ','
                    OPTIONALLY ENCLOSED BY '\"'
                    ESCAPED BY ''
                    LINES STARTING BY ''
                    TERMINATED BY '\r\n'
                    ( jiscode, zipcode_old, zipcode, pref_kana, city_kana, street_kana, pref, city, street, flag1, flag2, flag3, flag4, flag5, flag6 )";

                // 元のレコードを全削除
                $this->Postelcode->query($delete_sql);
                // 新しく読み込んだCSVからレコードを新しく追加
                $this->Postelcode->query($data_sql);

                // 読み取り後、アップロードされたファイルを削除
                // この機能いらないかもなので一旦排除
                // foreach (glob("./files/csvs/*.CSV") as $delFile) unlink($delFile);

                $this->Flash->set(__('OK. CSVs changed complete.', true));

            } else {
                $this->Flash->set(__('Failed to import data. Please, try again.', true));
            }
        }
    }
}
