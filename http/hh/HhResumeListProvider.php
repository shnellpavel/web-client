<?php
/**
 * User: shnell
 * Date: 19.03.15
 * Time: 22:16
 */

namespace web_client\http\hh;

use web_client\ARequest;
use web_client\http\PaginationHttpProvider;

class HhResumeListProvider extends PaginationHttpProvider {

    /**
     * @param ARequest $request
     *
     * @internal ResumeListResponse $response
     *
     * @return ResumeListResponse
     */
    public function sendRequest(ARequest $request) {
        return new ResumeListResponse(parent::sendRequest($request));
    }


} 