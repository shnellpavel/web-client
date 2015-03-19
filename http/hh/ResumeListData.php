<?php
/**
 * User: shnell
 * Date: 19.03.15
 * Time: 23:19
 */

namespace web_client\http\hh;

use web_client\http\AHttpData;

class ResumeListData extends AHttpData {
    public $items_on_page = 100;
    public $order_by = 'publication_time';
    public $area;
    public $exp_period;
    public $text;
    public $pos = 'full_text';
    public $logic = 'normal';
    public $clusters = 'true';

    /**
     * @return array
     */
    public function toArray() {
        return array();
    }
}