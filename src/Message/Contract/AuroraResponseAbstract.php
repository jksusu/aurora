<?php
declare(strict_types=1);

namespace Aurora\Message\Contract;

use Psr\Http\Message\ResponseInterface;

abstract class AuroraResponseAbstract implements ResponseInterface
{

    use AuroraMessage;

    protected $statusCode = 200;

    private static $phrases
        = [
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-status',
            208 => 'Already Reported',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => 'Switch Proxy',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Time-out',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Large',
            415 => 'Unsupported Media Type',
            416 => 'Requested range not satisfiable',
            417 => 'Expectation Failed',
            418 => 'I\'m a teapot',
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            425 => 'Unordered Collection',
            426 => 'Upgrade Required',
            428 => 'Precondition Required',
            429 => 'Too Many Requests',
            431 => 'Request Header Fields Too Large',
            451 => 'Unavailable For Legal Reasons',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Time-out',
            505 => 'HTTP Version not supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            508 => 'Loop Detected',
            511 => 'Network Authentication Required',
        ];

    /**
     * 获取响应状态码。
     *
     * 状态码是一个三位整数，用于理解请求。
     *
     * @return int 状态码。
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * 返回具有指定状态码和原因短语（可选）的实例。
     *
     * 如果未指定原因短语，实现代码 **可能** 选择 RFC7231 或 IANA 为状态码推荐的原因短语。
     *
     * 此方法在实现的时候，**必须** 保留原有的不可修改的 HTTP 消息实例，然后返回
     * 一个新的修改过的 HTTP 消息实例。
     *
     * @see http://tools.ietf.org/html/rfc7231#section-6
     * @see http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @param int $code 三位整数的状态码。
     * @param string $reasonPhrase 为状态码提供的原因短语；如果未提供，实现代码可以使用 HTTP 规范建议的默认代码。
     * @return self
     * @throws \InvalidArgumentException 如果传入无效的状态码，则抛出。
     */
    public function withStatus($code, $reasonPhrase = ''): self
    {
        if (strlen($code) !== 3) {
            throw new \InvalidArgumentException('Code length must be 3');
        }
        $new = clone $this;
        $new->statusCode = (int)$code;
    }

    /**
     * 获取与响应状态码关联的响应原因短语。
     *
     * 因为原因短语不是响应状态行中的必需元素，所以原因短语 **可能** 是空。
     * 实现代码可以选择返回响应的状态代码的默认 RFC 7231 推荐原因短语（或 IANA HTTP 状态码注册表中列出的原因短语）。
     *
     * @see http://tools.ietf.org/html/rfc7231#section-6
     * @see http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @return string 原因短语；如果不存在，则 **必须** 返回空字符串。
     */
    public function getReasonPhrase(): string
    {

    }
}