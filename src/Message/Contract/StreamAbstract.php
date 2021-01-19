<?php
declare(strict_types=1);

namespace Aurora\Message\Contract;

use Psr\Http\Message\StreamInterface;

abstract class StreamAbstract implements StreamInterface
{
    /**
     * 从头到尾将流中的所有数据读取到字符串。
     *
     * 这个方法 **必须** 在开始读数据前定位到流的开头，并读取出所有的数据。
     *
     * 警告：这可能会尝试将大量数据加载到内存中。
     *
     * 这个方法 **不得** 抛出异常以符合 PHP 的字符串转换操作。
     *
     * @see http://php.net/manual/en/language.oop5.magic.php#object.tostring
     * @return string
     */
    public function __toString(): string
    {

    }

    /**
     * 关闭流和任何底层资源。
     *
     * @return void
     */
    public function close()
    {

    }

    /**
     * 从流中分离任何底层资源。
     *
     * 分离之后，流处于不可用状态。
     *
     * @return resource|null 如果存在的话，返回底层 PHP 流。
     */
    public function detach()
    {

    }

    /**
     * 如果可知，获取流的数据大小。
     *
     * @return int|null 如果可知，返回以字节为单位的大小，如果未知返回 `null`。
     */
    public function getSize()
    {

    }

    /**
     * 返回当前读/写的指针位置。
     *
     * @return int 指针位置。
     * @throws \RuntimeException 产生错误时抛出。
     */
    public function tell(): int
    {

    }

    /**
     * 返回是否位于流的末尾。
     *
     * @return bool
     */
    public function eof(): bool
    {

    }

    /**
     * 返回流是否可随机读取。
     *
     * @return bool
     */
    public function isSeekable(): bool
    {

    }

    /**
     * 定位流中的指定位置。
     *
     * @see http://www.php.net/manual/en/function.fseek.php
     * @param int $offset 要定位的流的偏移量。
     * @param int $whence 指定如何根据偏移量计算光标位置。有效值与 PHP 内置函数 `fseek()` 相同。
     *     SEEK_SET：设定位置等于 $offset 字节。默认。
     *     SEEK_CUR：设定位置为当前位置加上 $offset。
     *     SEEK_END：设定位置为文件末尾加上 $offset （要移动到文件尾之前的位置，offset 必须是一个负值）。
     * @throws \RuntimeException 失败时抛出。
     */
    public function seek($offset, $whence = SEEK_SET)
    {

    }

    /**
     * 定位流的起始位置。
     *
     * 如果流不可以随机访问，此方法将引发异常；否则将执行 seek(0)。
     *
     * @throws \RuntimeException 失败时抛出。
     * @see http://www.php.net/manual/en/function.fseek.php
     * @see seek()
     */
    public function rewind()
    {

    }

    /**
     * 返回流是否可写。
     *
     * @return bool
     */
    public function isWritable(): bool
    {

    }

    /**
     * 向流中写数据。
     *
     * @param string $string 要写入流的数据。
     * @return int 返回写入流的字节数。
     * @throws \RuntimeException 失败时抛出。
     */
    public function write($string): int
    {

    }

    /**
     * 返回流是否可读。
     *
     * @return bool
     */
    public function isReadable(): bool
    {

    }

    /**
     * 从流中读取数据。
     *
     * @param int $length 从流中读取最多 $length 字节的数据并返回。如果数据不足，则可能返回少于
     *     $length 字节的数据。
     * @return string 返回从流中读取的数据，如果没有可用的数据则返回空字符串。
     * @throws \RuntimeException 失败时抛出。
     */
    public function read($length): string
    {

    }

    /**
     * 返回字符串中的剩余内容。
     *
     * @return string
     * @throws \RuntimeException 如果无法读取则抛出异常。
     * @throws \RuntimeException 如果在读取时发生错误则抛出异常。
     */
    public function getContents(): string
    {

    }

    /**
     * 获取流中的元数据作为关联数组，或者检索指定的键。
     *
     * 返回的键与从 PHP 的 stream_get_meta_data() 函数返回的键相同。
     *
     * @see http://php.net/manual/en/function.stream-get-meta-data.php
     * @param string $key 要检索的特定元数据。
     * @return array|mixed|null 如果没有键，则返回关联数组。如果提供了键并且找到值，
     *     则返回特定键值；如果未找到键，则返回 null。
     */
    public function getMetadata($key = null)
    {

    }
}