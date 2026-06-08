<?php
require_once(dirname(__FILE__) . '/php-query-onefile.php');

class MarketPrice
{
    private $html_gold = 'https://gold.tanaka.co.jp/commodity/souba/d-gold.php';
    private $html_platinum = 'https://gold.tanaka.co.jp/commodity/souba/d-platinum.php';
    private $html_sv_pd = 'https://apre-g.com/';

    private $doc_gold;

    private $replaced_gold;

    private $doc_pt;

    private $replaced_pt;

    private $doc_sv_pd;

    private $replaced_silver;

    private $replaced_pd;

    private $regexp = '/[^0-9]/';

    public $post_name = array(
        'gold-bullion' => 'gold',
        '24k' => 'k24',
        '22k' => 'k22',
        '20k' => 'k20',
        '18k' => 'k18',
        '14k' => 'k14',

        'platinum' => 'platinum',

        'silver' => 'silver',

        'palladium' => 'palladium',
    );

    public $ratio = array(
        'gold' => 1,
        'k24' => 0.97,
        'k22' => 0.881,
        'k20' => 0.805,
        'k18' => 0.74,
        'k14' => 0.55,

        'platinum' => 1,
        'pt1000' => 0.97,
        'pt950' => 0.92,
        'pt900' => 0.885,
        'pt850' => 0.835,

        'silver' => 1,

        'palladium' => 1,
    );

    public $chart;

    public function __construct()
    {
        $this->doc_gold = phpQuery::newDocument(file_get_contents($this->html_gold));
        $this->doc_pt = phpQuery::newDocument(file_get_contents($this->html_platinum));
        $this->doc_sv_pd = phpQuery::newDocument(file_get_contents($this->html_sv_pd));

        $this->replaced_gold = preg_replace($this->regexp, '', $this->doc_gold["table#metal_price .gold .purchase_tax"]);
        $this->replaced_pt = preg_replace($this->regexp, '', $this->doc_pt["table#metal_price .pt .purchase_tax"]);
        $this->replaced_silver = preg_replace($this->regexp, '', $this->doc_sv_pd["table:eq(4) .strong:eq(0) td"]);
        $this->replaced_pd = preg_replace($this->regexp, '', $this->doc_sv_pd["table:eq(5) .strong:eq(4) td"]);
    }

    public function get($arg, $formatting = true)
    {
        return ($formatting)? @number_format($this->$arg()) : $this->$arg();
    }

    public function pubdate()
    {
        return $this->doc_gold["div:not(.tab_contents).contents h3 span"]->text();
    }
    private function gold()
    {
        return $this->replaced_gold;
    }
    private function platinum()
    {
        return $this->replaced_pt;
    }
    private function silver(){
        return $this->replaced_silver;
    }
    private function palladium(){
        return $this->replaced_pd;
    }

    private function k24()
    {
        return $this->replaced_gold * $this->ratio[__FUNCTION__];
    }
    private function k22()
    {
        return $this->replaced_gold * $this->ratio[__FUNCTION__];
    }
    private function k20()
    {
        return $this->replaced_gold * $this->ratio[__FUNCTION__];
    }
    private function k18()
    {
        return $this->replaced_gold * $this->ratio[__FUNCTION__];
    }
    private function k14()
    {
        return $this->replaced_gold * $this->ratio[__FUNCTION__];
    }

    private function pt1000()
    {
        return $this->replaced_pt * $this->ratio[__FUNCTION__];
    }
    private function pt950()
    {
        return $this->replaced_pt * $this->ratio[__FUNCTION__];
    }
    private function pt900()
    {
        return $this->replaced_pt * $this->ratio[__FUNCTION__];
    }
    private function pt850()
    {
        return $this->replaced_pt * $this->ratio[__FUNCTION__];
    }

    private function c_gold()
    {
        return trim(str_replace('円', '', strip_tags($this->doc_gold["table#metal_price .gold .purchase_ratio"])));
    }
    private function c_pt()
    {
        return trim(str_replace('円', '', strip_tags($this->doc_pt["table#metal_price .pt .purchase_ratio"])));
    }

    public function chart_labels()
    {
        $arr = preg_split('/\n/', str_replace(".", "/", $this->doc_gold["#price_trends_day td.date"]->text()));
        $arr = array_filter($arr, "strlen");
        $arr = array_map(function ($item) {
            return $item . "";
        }, $arr);
        return json_encode($arr);
    }
    public function chart_data($chart_root = "gold", $json_encode = true, $comodity = null)
    {
        $call = "doc_" . $chart_root;
        $arr = preg_split('/\n/', str_replace(",", "", $this->$call["#price_trends_day td.purchase_tax"]->text()));
        $arr = array_filter($arr, "strlen");

        if (!empty($comodity) && !empty($c = $this->ratio[$this->post_name[$comodity]])) {
            $arr = array_map(function ($item) use ($c) {
                return round($item * $c);
            }, $arr);
        }

        $this->chart = $arr;
        return ($json_encode)? json_encode($arr) : $arr;
    }
    public function gold_data_min()
    {
        $arr = $this->chart;
        $arr_min = ceil(min($arr) / 100) * 100;
        return $arr_min - 100;
    }
    public function gold_data_max()
    {
        $arr = $this->chart;
        $arr_max = floor(max($arr) / 100) * 100;
        return $arr_max + 100;
    }

    public function chart_period($chart_root = "gold")
    {
        $call = "doc_" . $chart_root;
        return $this->$call[".tab_contents h3 span"]->text();
    }
}
?>