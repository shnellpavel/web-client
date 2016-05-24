<?php
/**
 * User: shnell
 * Date: 20.03.15
 * Time: 22:22
 */

namespace web_client\http\hh;

use web_client\exceptions\ProcessResponceException;
use web_client\http\HttpProcessedResponse;

class ResumeResponse extends HttpProcessedResponse {

    protected function process() {
        $baseBody = $this->originalResponse->getBody();
        $this->body = array();

        // Имя
        if (!preg_match('/data-qa="resume-personal-name"[^>]*?>(.*?)</sim', $baseBody, $name)) {
            throw new ProcessResponceException("Current resume name");
        }

        $this->body['name'] = $name[1];

        // Телефоны
        if (!preg_match_all('/itemprop="telephone"[^>]*?>(.*?)<\/(?:div|span)>/sim', $baseBody, $phones)) {
            $this->body['phones'] = null;
        } else {
            $this->body['phones'] = array_map(function ($phone) {
                return preg_replace("/\D/sim", '', $phone);
            }, $phones[1]);
        }

        // Email
        if (!preg_match_all('/itemprop="email"[^>]*?>(.*?)<\/a>/sim', $baseBody, $emails)) {
            $this->body['emails'] = null;
        } else {
            $this->body['emails'] = array_map(function ($email) {
                return preg_replace("/\s/sim", '', $email);
            }, $emails[1]);
        }

        // Последний опыт
        if (!preg_match('/itemtype="http:\/\/schema.org\/Organization"[^>]*?>.*?<div[^>]*?itemprop="name"[^>]*?resume-block__sub-title"[^>]*?>(.*?)<\/div>/sim', $baseBody, $lastCompany)) {
            $this->body['lastCompany'] = null;
        } else {
            $this->body['lastCompany'] = strip_tags($lastCompany[1]);
        }

        // Последняя должность
        if (!preg_match('/itemtype="http:\/\/schema.org\/Organization"[^>]*?>.*?<div[^>]*?resume-block-experience-position"[^>]*?>(.*?)<\/div>/sim', $baseBody, $lastPosition)) {
            $this->body['lastCompany'] = null;
        } else {
            $this->body['lastPosition'] = strip_tags($lastPosition[1]);
        }
    }
}