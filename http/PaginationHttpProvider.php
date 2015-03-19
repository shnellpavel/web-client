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
    protected $pageLimit;

    public function __construct($pageLimit, $startPage = 1, $pageParam = 'page', $opts = array()) {
        parent::__construct($opts);
        $this->curPage = $startPage;
        $this->pageParam = $pageParam;
        $this->pageLimit = ($pageLimit > 1) ? $pageLimit : 1;
    }

    public function next(HttpRequest $request) {
        if ($this->curPage >= $this->pageLimit) {
            return null;
        }

        $this->curPage++;
        $data = $request->getData();
        $data[$this->pageParam] = $this->curPage;
        $request->setData($data);
        return $this->sendRequest($request);
    }


    public function prev(HttpRequest $request) {
        if ($this->curPage <= 1) {
            return null;
        }

        $this->curPage--;
        $data = $request->getData();
        $data[$this->pageParam] = $this->curPage;
        $request->setData($data);
        return $this->sendRequest($request);
    }
}