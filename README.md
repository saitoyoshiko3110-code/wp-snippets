# WordPress Useful Snippets

私がWordPress開発で頻繁に利用する、保守性とパフォーマンスを重視したコードスニペット集です。

## 収録内容
- **functions-enqueue-scripts.php**: CSSやJavaScriptを安全に読み込むための定義ファイルです。
- **functions-custom-post-type.php**: カスタム投稿タイプを安全に読み込むためのファイルです。
- **functions-utility.php**: その他投稿の利便性を上げるためのファイルです。
- **acf-script.php**: ACFを利用する際の出力コードをまとめたファイルです。
- **header.php**: headerサンプルファイルです。
- **front-page.php**: front-pageサンプルファイルです。
- **style.css**: WPテーマ名設定サンプルを記述しています。
- **wp-jQuery.js**: jQueryをwpで利用する際のコードサンプルを記述しています。

## こだわりポイント
- **functions-enqueue-scripts　パフォーマンスの最適化**: `is_home()` や `is_front_page()` などの条件分岐を活用し、必要なページでのみリソースを読み込むことで、サイト全体の表示速度低下を防ぐ実装をしています。
- **安全性**: 外部スクリプトの管理や、依存関係の制御を徹底しています。
