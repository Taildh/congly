<html xmlns="https://www.w3.org/1999/xhtml" lang="vi">
<head>
    <meta charset="UTF-8">
</head>

<?php
ini_set('display_errors', 1);
require 'Crawler.php';
$crawler = new Crawler('https://congly.vn/chinh-tri');
$crawler->getContentGetLink()->getLink();
$data = $crawler->getDataCrawler();

print_r($data);


//$content = file_get_contents('https://congly.vn/chinh-tri');
//$content = substr($content, strpos($content, '<div class="l-main">'));
//$content = substr($content, 0, strpos($content, '<div class="c-paging">'));
//preg_match_all('/<a\s[^>]*href=\"([^\"]*)\"[^>]*>(.*)<\/a>/siU', $content, $m);
//
//$link = array_unique($m[1]);
//$final = [];
//foreach ($link as $t) {
//    if ($t == 'javascript:;') {
//        break;
//    }
//    $final[] = $t;
//}
////print_r($final);
//
//
//$title = '/<h1\s[^>]*class=\"c-detail-head__title\"[^>]*>(.*)<\/h1>/siU';
//
//preg_match($title,file_get_contents('https://congly.vn/nang-tam-quan-he-hop-tac-tu-phap-viet-nam-han-quoc-219660.html'),$t);
//print_r($t['1']);
//
//$des = '/<h2\s[^>]*class=\"desc\"[^>]*>(.*)<\/h2>/siU';
//preg_match($des,file_get_contents('https://congly.vn/nang-tam-quan-he-hop-tac-tu-phap-viet-nam-han-quoc-219660.html'),$d);
//print_r($d[1]);
//
//$detail = '/<div\s[^>]*class=\"content-main-normal|c-news-detail\sis-full\"[^>]*>(.*)<\/div>/siU';
//
////preg_match($detail,file_get_contents('https://congly.vn/nang-tam-quan-he-hop-tac-tu-phap-viet-nam-han-quoc-219660.html'),$dt);
//preg_match($detail,file_get_contents('https://congly.vn/hang-ngan-cay-tre-hien-dien-trong-trien-lam-khat-vong-cong-hien-219936.html'),$dt);
//
//print_r($dt[1]);

?>
</html>
