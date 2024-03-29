<?php

namespace Bcchicr\StudentList\Http\Foundation\Factory;

use Bcchicr\StudentList\Http\Foundation\RedirectResponse;
use Bcchicr\StudentList\Http\Foundation\Response;

class ResponseFactory
{
    public function createResponse(int $status = 200, string $reasonPhrase = ''): Response
    {
        return new Response(status: $status, reason: $reasonPhrase);
    }
    public function createRedirectResponse(string $url): RedirectResponse
    {
        return new RedirectResponse($url);
    }
}
