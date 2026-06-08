# ジュエルカフェリニューアル

## 開発環境構築

gulp立ち上げ

$ yarn install
$ npx gulp 



##　SCSS構成
  - component =>ボタンなどのモジュール
  - foundation => font-baseを設置(globalにまとめても良いかも)
  - global => resetやmixinなどの管理
  - layout => 共通するパーツ管理
  - project =>いくつかの↑Componentと、他の要素によって構成される大きな単位のモジュールを管理
  - utility => ComponentとProjectのモディファイア（パターン）で解決することができないスタイル、また、調整のための便利クラスなどを管理

### 命名規則Flocss
- 参考(https://qiita.com/super-mana-chan/items/644c6827be954c8db2c0)