<?php
/**
 * User: shnell
 * Date: 19.03.15
 * Time: 23:19
 */

namespace web_client\http\hh;

use web_client\http\AHttpData;

class ResumeListData extends AHttpData {
    public $itemsOnPage = 100;
    public $orderBy = 'publication_time';
    public $areas;
    public $expPeriod = 'all_time';
    public $text;
    public $pos = 'full_text';
    public $logic = 'normal';
    public $clusters = 'true';
    public $specializations = array();
    public $relocation = 'living_or_relocation';
    public $salaryFrom;
    public $salaryTo;
    public $currencyCode;
    public $education;
    public $ageFrom;
    public $ageTo;
    public $gender = 'unknown';
    public $searchPeriod = 0;

    // /search/resume?items_on_page=100&specialization=2.463&specialization=2.469&specialization=2.468&specialization=2.200&clusters=true&page=0
    /**
     * @return array
     */
    public function toArray() {
        $res = array(
            'items_on_page' => $this->itemsOnPage,
            'clusters' => $this->clusters,
        );
        if ($this->orderBy) {
            $res['order_by'] = $this->orderBy;
        }
        if ($this->areas) {
            $res['area'] = $this->areas;
        }
        if ($this->expPeriod) {
            $res['exp_period'] = $this->expPeriod;
        }
        if ($this->text) {
            $res['text'] = $this->text;
        }
        if ($this->pos) {
            $res['pos'] = $this->pos;
        }
        if ($this->logic) {
            $res['logic'] = $this->logic;
        }
        if ($this->specializations) {
            $res['specialization'] = $this->specializations;
        }
        if ($this->relocation) {
            $res['relocation'] = $this->relocation;
        }
        if ($this->salaryFrom) {
            $res['salary_from'] = $this->salaryFrom;
        }
        if ($this->salaryTo) {
            $res['salary_to'] = $this->salaryTo;
        }
        if ($this->currencyCode) {
            $res['currency_code'] = $this->currencyCode;
        }
        if ($this->education) {
            $res['education'] = $this->education;
        }
        if ($this->ageFrom) {
            $res['age_from'] = $this->ageFrom;
        }
        if ($this->ageTo) {
            $res['age_to'] = $this->ageTo;
        }
        if ($this->gender) {
            $res['gender'] = $this->gender;
        }
        if ($this->searchPeriod) {
            $res['search_period'] = $this->searchPeriod;
        }

        return $res;
    }

    public function toParams() {
        $res = $this->toArray();
        unset($res['area'], $res['specialization']);
        $params = http_build_query($res);

        foreach ($this->specializations as $specialization) {
            $params .= '&specialization='.urlencode($specialization);
        }

        foreach ($this->areas as $area) {
            $params .= '&area='.urlencode($area);
        }

        return $params;
    }

}