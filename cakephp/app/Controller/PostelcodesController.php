<?php
App::uses('AppController', 'Controller');
class PostelcodesController extends AppController {

    public function index() {
        // if ($this->request->is('post')) {
            $csv = $this->request->data['Postelcodes']['csvfile'];
            debug(WWW_ROOT . 'files/csvs');
            // exit;
            //イメージ保存先パス
            $csv_save_path = WWW_ROOT . 'files/csvs';
            $tmp_file = $csv['tmp_name'];

            //イメージの保存処理
            if (file_exists($tmp_file)) {
                move_uploaded_file($tmp_file, $csv_save_path);
            } else {
                echo 'nothing';
            }
    }

    // public function import() {
    //     $Postelcode = $this->Postelcode;
    //     $this->Postelcode->importCSV( './files/csvs/KEN_ALL.CSV' );
    //     $this->redirect( array('action' => 'index') );
    // }

    // ビヘイビアなし
    public function import() {
        $filename = './files/csvs/KEN_ALL.CSV';
        if(file_exists($filename)) {
            $db = $this->Postelcode->getDataSource();
            $db->begin($this->Postelcode);
            // ここでエラーになる
            // deleteAllを呼ぶときに、postecodes.idを呼んで来るため、ないよって言われるエラー
            $this->Postelcode->deleteAll('1=1');
            $this->Postelcode->importCSV($filename);
            if($this->Postelcode->getImportErrors()) {
                $db->rollback($this->Postelcode);
                $this->Flash->set(__('Incorrect data type. Please, try again.', true));
            } else {
                $db->commit($this->Postelcode);
                $this->Flash->set(__('The import was successful.', true));

                debug($db);
                exit;
                foreach (glob("./files/csvs/*.CSV") as $delFile) {
                    unlink($delFile);
                }
            }
        } else {
            $this->Flash->set(__('Failed to import data. Please, try again.', true));
        }
        $this->redirect(array('action' => 'index'));
    }

    public function test() {
        // 今は直接フォルダに入れているCSVファイルを読み込ませているので
        // /postelcodes/indexからアップロードされたcsvファイルをここに読み込まれうように編集する必要あり
        $filePath = "./files/csvs/KEN_ALL.CSV";
        // 一旦読み込んだら下のif文でファイルを適切な場所に移動させる。
        // プラグインを使わずに画像アップロード機能を作った時と同じ要領
        // if (move_uploaded_file($_FILES["csvFile"]["tmp_name"], $filePath)) {
        //     chmod($filePath, 0644); // ファイルアップロード成功
        // } else {
        // // ファイルアップロード失敗
        // }
        $objFile = new SplFileObject($filePath);
        $objFile->setFlags(SplFileObject::READ_CSV);
        $objFile->setCsvControl("\t" /* 区切り文字 */, "\"" /* 囲い文字 */);

        foreach ($objFile as $key => $line) {
            foreach ($line as $buf) {
                $buf = mb_convert_encoding($buf, "UTF-8", "sjis-win");
                $records[$key][] = $buf;
            }
        }
        debug($records);
        exit;

        // ここにdbにupdateさせるコードをかく
        //
        //

        // ここでアップロードされたcsvを削除
        foreach (glob("./files/csvs/*.CSV") as $delFile) unlink($delFile);
        $this->redirect( array('action' => 'index') );
    }
}
