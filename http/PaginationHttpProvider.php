<?php
/**
 * User: shnell
 * Date: 19.03.15
 * Time: 21:46
 */

namespace web_client\http;

class PaginationHttpProvider extends HttpRequestProvider {
    protected $curPage;
    protected $pageParam;
    protected $minPage;
    protected $maxPage;

    public function __construct($maxPage, $minPage = 1, $startPage = 1, $pageParam = 'page', $opts = array()) {
        parent::__construct($opts);
        $this->curPage = $startPage;
        $this->pageParam = $pageParam;
        $this->maxPage = $minPage;
        $this->maxPage = ($this->maxPage > $this->minPage) ? $this->maxPage : $this->minPage;
    }

    public function next(HttpRequest $request) {
        if ($this->curPage > $this->maxPage) {
            return null;
        }

        $data = $request->getData();
        if ($data instanceof AHttpData) {
            $data->page = $this->curPage;
        } else {
            $data[$this->pageParam] = $this->curPage;
        }
        $this->curPage++;
        $request->setData($data);
        return $this->sendRequest($request);
    }


    public function prev(HttpRequest $request) {
        if ($this->curPage < $this->minPage) {
            return null;
        }

        $data = $request->getData();
        if ($data instanceof AHttpData) {
            $data->page = $this->curPage;
        } else {
            $data[$this->pageParam] = $this->curPage;
        }
        $this->curPage--;
        $request->setData($data);
        return $this->sendRequest($request);
    }
}