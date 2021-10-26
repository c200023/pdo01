/* DB接続部分の関数化 */    ⇐ ファイル名は「functions.php」とする 

function db_conn() { 

    /* データベース定義 */ 

    define('DSN','mysql:host=localhost;dbname=lesson1;charset=utf8mb4'); 

    define('DB_USER','root'); 

    define('DB_PASS',''); 

    /* データベースに接続　*/ 

    try { 

        [データベース接続処理] 

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 

    } catch (PDOException $e){ 

        echo $e->getMessage(); 

        exit; 

    } 

    return $dbh; 

} 

 

/*  complete.php 本体側処理   */ 

（途中省略） 

[関数ファイルの読み込み] 

（途中省略） 

$dbh = [データベース接続関数]; 

try{ 

    $sql = "INSERT INTO user (email, name, gender) VALUE (:email, :name, :gender)"; 

      [クエリ実行準備]; 

    $stmt->bindValue(':email', $email, PDO::PARAM_STR); 

      [名前のプレースホルダーに値をバインド]; 

      [性別のプレースホルダーに値をバインド]; 

    $stmt->execute(); 

      [DB切断]; 

}catch (PDOException $e){ 

    echo($e->getMessage()); 

    die(); 

} 
