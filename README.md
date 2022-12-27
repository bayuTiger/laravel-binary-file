# Laravel8 MySQLにファイルをbinaryで保存・表示する

## 環境

- Laravel: 8.6.2
- Vue.js: 2.6.12
- PHP: 8.0.8
- Composer: 2.5.1
- Node.js: 19.3.0

```zsh
$ composer create-project --prefer-dist laravel/laravel:^8.0 project-name
$ php artisan migrate:fresh
$ composer require laravel/ui
$ php artisan ui bootstrap
$ npm install && npm run dev
$ php artisan serve
```

### Tips.Laravel Pintの導入

せっかくなのでLaravel専用のFormatterであるLaravel Pintを導入します。
プロジェクトルートに以下のコマンドを入力します。

```zsh
$ composer require laravel/pint --dev
```

フォーマットをかけたい時は、適宜以下のコマンドを入力しましょう。
使い心地が良ければ、aliasを設定してみてください。

```zsh
$ vendor/bin/pint -v
```

## 1. テーブルを追加する

ファイルを保存するためのテーブル(とついでにModel)を作成します

```zsh
$ php artisan make:model File --migration
```

まずmigrationファイルを以下のように編集します

```php:create_files_table
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // <-- 追加
            $table->binary('content'); // <-- 追加
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
```

次にModelを編集します

```php:File.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'content']; // <-- 追加
}
```


## 2. 画面を用意する

## 3. 保存処理を追加する

## 4. 表示処理を追加する

## ex.Githubのリポジトリ
