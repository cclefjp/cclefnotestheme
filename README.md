# Cclef Notes Theme - a WordPress theme

---

Cclef Notes Themeは個人プログラマcclefが自分の勉強と自サイト運営のために作成しているWordPressテーマです。  


---

## 変更履歴

* 以前に開発していたものから引き継いで新しくプロジェクトを開始しました。
* Version 0.1をfix。最低限の動作ができるようにしました


---

## TODO

* バージョン0.2のTODO: シリーズ記事に対して左サイドバーを表示し、記事間を遷移できるようにする。
    * その仕組みとして、タクソノミーで'series'をもつものは通常のcontent-single.phpではなく3カラム型のcontent-seriessingle.phpを出力する
* バージョン0.3のTODO: CSS等で表示を改善する

---

## 基本思想

CNTは以下のような思想で作成しています。

* ドキュメントをスタイル、構造、コンテンツに分離する
* スタイルはCSS、構造はテーマ内のphp/html、メタ情報タグで記載し、コンテンツと分離する
* 外観はシンプルで余計な装飾をつけない
* レスポンシブデザインであること
* リーダブル、モジュラー、プログラマブルな構造を目指す
* プラグイン化できるものはプラグイン化し、本体と分離する
* 特定のプラグインには依存しない
* 標準WordPress機能を活用する

---

## インストール

### 手順1

```sh
$ git clone https://github.com/cclefjp/cclefnotestheme.git
```
でクローンされた内容から、`cclefnotes`ディレクトリをお使いのWordPressの`DocumentRoot/wp-content/themes/`にコピーしてください。

### 手順2
WordPressの管理画面で「外観」→「テーマ」からCclef Notesを有効化してください。

---

## ライセンスと免責事項

本テーマはMIT Licenseで配布しています。  
本テーマの使用によって生じたいかなる損害に対しても作者は一切の責任を負いません。自己責任にてご使用ください。
