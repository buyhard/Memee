# Memee

## 概要
Memeeはweb上で動作するTodoリストアプリケーションです。
動作確認用ページ(Render.com): [https://memee-nunp.onrender.com](https://memee-nunp.onrender.com)

## 使用技術
- 使用言語: PHP 8.4.1, JavaScript
- バックエンドフレームワーク: Laravel 12.x
- ビルドツール: vite
- フロントエンド: Blade, tailwindcss v4, Alpine.js, Axios
- データベース: SQLite 3.51
## 動作環境


## 機能

- タスクの登録
締切日と説明を決めた後に登録ボタンを押すとタスクを登録できる。登録したタスクは蓄積され、確認することができる。

- タスクの管理
タスクは「完了！」と「未完了」の二種類の状態をとる。 

- タスクの削除
完了、未完了に関わらずタスクは削除することができる。  
タスクを削除すると仮削除が行われる。この状態になると「削除されたタスク」として分類され、通常の一覧画面には表示されなくなる。なお、時間経過によって自動的に削除されることはない。  
仮削除されたタスクは完全に削除することが可能である。完全削除を行うとデータベースから完全にデータが消える。

- 表示するタスクの切り替え
「未完了のタスク」「完了したタスク」「削除されたタスク」の三種類でタスクは分けられる。

- 

基本的に画面はメイン画面の一つだけである。左側にはTodoリストが表示され、右側には表示切り替えボタンとタスク登録ボタンがある。  
## 工夫した点
- SPAライクな作りにより快適な動作を実現
Todoリストの性質上、画面遷移が少ないためJavaScriptを使用して非同期に表示の制御およびデータの送受信を行う仕組みをとりました。  
サーバーサイドでレンダリングを行うため、完全なSPAではありませんが、画面遷移の際に通信やレンダリングが必要最低限なものだけとなっています。  
また、Bladeファイルの中に記述しても比較的読みやすくするため、純粋なJavaScriptではなくAlpine.jsを使用しました。  

-

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

