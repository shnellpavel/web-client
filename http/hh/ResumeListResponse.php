<?php
/**
 * User: shnell
 * Date: 19.03.15
 * Time: 22:21
 */

namespace web_client\http\hh;

use web_client\AProcessedResponse;
use web_client\exceptions\ProcessResponceException;

class ResumeListResponse extends AProcessedResponse {
    protected function process() {
        $baseBody = $this->originalResponse->getBody();
        $this->body = array();

        if (!preg_match_all('/<tr.*?itemscope="itemscope".*?itemtype="http:\/\/schema.org\/Person".*?\/tr>/sim', $baseBody, $resumesBlocks)) {
            throw new ProcessResponceException("Resume block");
        }

        $resumesBlocks = $resumesBlocks[0];

        foreach ($resumesBlocks as $resumeBlock) {
            if (!preg_match('/<a[^>]*?itemprop="jobTitle"[^>]*?>.*?<\/a>/sim', $resumeBlock, $linkToResume)) {
                throw new ProcessResponceException("Anchor to resume card");
            }

            $linkToResume = $linkToResume[0];

            if (!preg_match('/<a[^>]*?href="(.*?)"[^>]*?>(.*?)<\/a>/sim', $linkToResume, $m)) {
                throw new ProcessResponceException("Resume title and link");
            }

            $this->body[$m[1]] = $m[2];
        }
    }
}