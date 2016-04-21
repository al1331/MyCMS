<?php
/*function articles_all(){
    $art1 = ["id"=>1, "title"=>"Title1", "date"=>"2015-01-01", "content"=>"БольшойТекст1"];
    $art2 = ["id"=>2, "title"=>"Title2", "date"=>"2015-01-01", "content"=>"ОченьБольшойТекст2"];
    $art3 = ["id"=>3, "title"=>"Title3", "date"=>"2016-04-12", "content"=>"МаленькийТекст3"];    
    $arr[0] = $art1;
    $arr[1] = $art2;
    $arr[2] = $art3;    

    return $arr;
    
}*/

function articles_all($link)
{
    $query = "select * from articles order by id desc";
    $result = mysqli_query($link,$query);    
    
    if (!$result) 
        die(mysqli_error($link));
    
    //Запрос из БД
    $n = mysqli_num_rows($result);
    $articles = array();
    
    for($i=0; $i<$n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }
    
    return $articles;
}

/*function articles_get($id){
    return ["id"=>1, "title"=>"Это простой заголовок", "date"=>"2015-01-01", "content"=>"Здесь будет статья2"];
}*/

function articles_get($link, $id_article){
    $query = sprintf("select * from articles where id=%d",(int)$id_article);
    $result = mysqli_query($link,$query);    
    
    if (!$result) 
        die(mysqli_error($link));
    
    $articles = mysqli_fetch_assoc($result);
    return $articles;
}
  
//добавление новых записей
function articles_new($link, $title, $date, $content){
    //подготовка
    $title = trim($title); //убираем пробелы слева/справа
    $content = trim($content); //убираем пробелы
    
    //Проверка
    if ($title == '') //если не пустая
        return false;
    
    $t = "insert into articles (title, date, content) values ('%s', '%s', '%s')";
    //mysqli_real_escape_string - защита от sql-инъекций
    $query = sprintf($t, mysqli_real_escape_string($link, $title),
                         mysqli_real_escape_string($link, $date),
                         mysqli_real_escape_string($link, $content));
    
    //echo $query;
    $result = mysqli_query($link, $query); //выполнение запроса
    if (!$result)
        die(mysqli_error($link));
    
    return true;
}

function articles_edit($id, $title, $date, $content){
}

function articles_delete($id){
}

?>