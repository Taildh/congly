<?php

class Crawler
{
    protected $arrLink = [];
    protected $page = 1;
    protected $url;
    protected $contentGetLink;
    protected $contentGetDetail;
    protected $href;
    protected $dataCrawler = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getContentGetLink()
    {
        $this->content = file_get_contents($this->url);
        return $this;
    }

    public function getContentDetail()
    {
        $this->contentGetDetail = file_get_contents($this->href);
        return $this;
    }

    public function getLink()
    {
        $content = substr($this->content, strpos($this->content, '<div class="l-main">'));
        $content = substr($content, 0, strpos($content, '<div class="c-paging">'));
        preg_match_all('/<a\s[^>]*href=\"([^\"]*)\"[^>]*>(.*)<\/a>/siU', $content, $m);

        $link = array_unique($m[1]);

        foreach ($link as $href) {
            if ($href == 'javascript:;') {
                break;
            }
            $this->arrLink[] = $href;
        }

        return $this;
    }

    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }

    public function getTitle()
    {
        $title = '/<h1\s[^>]*class=\"c-detail-head__title\"[^>]*>(.*)<\/h1>/siU';
        preg_match($title, $this->contentGetDetail, $tt);
        return $tt['1'];
    }

    public function getDesc()
    {
        $des = '/<h2\s[^>]*class=\"desc\"[^>]*>(.*)<\/h2>/siU';
        preg_match($des, $this->contentGetDetail, $de);
        return $de[1];
    }

    public function getDetail()
    {
        $detail = '/<div\s[^>]*class=\"(content-main-normal|c-news-detail\sis-full)\"[^>]*>(.*)<\/div>/siU';
        preg_match($detail, $this->contentGetDetail, $dt);
        return $dt['0'];
    }

    public function getAuthor()
    {
        $author = '/<span\s[^>]*class=\"c-detail-head__author\"[^>]*>(.*)<\/span>/siU';
        preg_match($author, $this->contentGetDetail, $au);
        return $au['1'];
    }

    public function getDatePublish()
    {
        $date = '/<span\s[^>]*class=\"c-detail-head__time\"[^>]*>(.*)<\/span>/siU';
        preg_match($date, $this->contentGetDetail, $dt);
        return $dt['1'];
    }

    public function getDataCrawler()
    {
        foreach ($this->arrLink as $href) {
            $this->setHref($href)->getContentDetail();
            $this->dataCrawler[] = [
                'title' => $this->getTitle(),
                'desc' => $this->getDesc(),
                'detail' => $this->getDetail(),
                'author' => $this->getAuthor(),
                'date' => $this->getDatePublish()
            ];
        }

        return $this->dataCrawler;
    }
}