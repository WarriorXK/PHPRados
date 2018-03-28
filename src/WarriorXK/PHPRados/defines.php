<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 28/03/2018
 * Time: 10:29
 */

declare(strict_types = 1);

define('PHPRADOS_UNIT_B', 'b');
define('PHPRADOS_UNIT_KB', 'kb');
define('PHPRADOS_UNIT_MB', 'mb');
define('PHPRADOS_UNIT_GB', 'gb');
define('PHPRADOS_UNIT_TB', 'tb');
define('PHPRADOS_UNIT_PB', 'pb');
define('PHPRADOS_UNIT_EB', 'eb');
define('PHPRADOS_UNIT_ZB', 'zb');
define('PHPRADOS_UNIT_YB', 'yb');
define('PHPRADOS_UNITS', [
    PHPRADOS_UNIT_B => PHPRADOS_UNIT_B,
    PHPRADOS_UNIT_KB => PHPRADOS_UNIT_KB,
    PHPRADOS_UNIT_MB => PHPRADOS_UNIT_MB,
    PHPRADOS_UNIT_GB => PHPRADOS_UNIT_GB,
    PHPRADOS_UNIT_TB => PHPRADOS_UNIT_TB,
    PHPRADOS_UNIT_PB => PHPRADOS_UNIT_PB,
    PHPRADOS_UNIT_EB => PHPRADOS_UNIT_EB,
    PHPRADOS_UNIT_ZB => PHPRADOS_UNIT_ZB,
    PHPRADOS_UNIT_YB => PHPRADOS_UNIT_YB,
]);

define('PHPRADOS_RESOURCETYPE_CLUSTER', 'RADOS Cluster');
define('PHPRADOS_RESOURCETYPE_IOCTX', 'RADOS IOCtx');

if (!defined('EPERM')) {
    define('EPERM', 1);
}
if (!defined('ENOENT')) {
    define('ENOENT', 2);
}
if (!defined('ESRCH')) {
    define('ESRCH', 3);
}
if (!defined('EINTR')) {
    define('EINTR', 4);
}
if (!defined('EIO')) {
    define('EIO', 5);
}
if (!defined('ENXIO')) {
    define('ENXIO', 6);
}
if (!defined('E2BIG')) {
    define('E2BIG', 7);
}
if (!defined('ENOEXEC')) {
    define('ENOEXEC', 8);
}
if (!defined('EBADF')) {
    define('EBADF', 9);
}
if (!defined('ECHILD')) {
    define('ECHILD', 10);
}
if (!defined('EAGAIN')) {
    define('EAGAIN', 11);
}
if (!defined('ENOMEM')) {
    define('ENOMEM', 12);
}
if (!defined('EACCES')) {
    define('EACCES', 13);
}
if (!defined('EFAULT')) {
    define('EFAULT', 14);
}
if (!defined('ENOTBLK')) {
    define('ENOTBLK', 15);
}
if (!defined('EBUSY')) {
    define('EBUSY', 16);
}
if (!defined('EEXIST')) {
    define('EEXIST', 17);
}
if (!defined('EXDEV')) {
    define('EXDEV', 18);
}
if (!defined('ENODEV')) {
    define('ENODEV', 19);
}
if (!defined('ENOTDIR')) {
    define('ENOTDIR', 20);
}
if (!defined('EISDIR')) {
    define('EISDIR', 21);
}
if (!defined('EINVAL')) {
    define('EINVAL', 22);
}
if (!defined('ENFILE')) {
    define('ENFILE', 23);
}
if (!defined('EMFILE')) {
    define('EMFILE', 24);
}
if (!defined('ENOTTY')) {
    define('ENOTTY', 25);
}
if (!defined('ETXTBSY')) {
    define('ETXTBSY', 26);
}
if (!defined('EFBIG')) {
    define('EFBIG', 27);
}
if (!defined('ENOSPC')) {
    define('ENOSPC', 28);
}
if (!defined('ESPIPE')) {
    define('ESPIPE', 29);
}
if (!defined('EROFS')) {
    define('EROFS', 30);
}
if (!defined('EMLINK')) {
    define('EMLINK', 31);
}
if (!defined('EPIPE')) {
    define('EPIPE', 32);
}
if (!defined('EDOM')) {
    define('EDOM', 33);
}
if (!defined('ERANGE')) {
    define('ERANGE', 34);
}
if (!defined('EDEADLK')) {
    define('EDEADLK', 35);
}
if (!defined('ENAMETOOLONG')) {
    define('ENAMETOOLONG', 36);
}
if (!defined('ENOLCK')) {
    define('ENOLCK', 37);
}
if (!defined('ENOSYS')) {
    define('ENOSYS', 38);
}
if (!defined('ENOTEMPTY')) {
    define('ENOTEMPTY', 39);
}
if (!defined('ELOOP')) {
    define('ELOOP', 40);
}
if (!defined('EWOULDBLOCK')) {
    define('EWOULDBLOCK', 11);
}
if (!defined('ENOMSG')) {
    define('ENOMSG', 42);
}
if (!defined('EIDRM')) {
    define('EIDRM', 43);
}
if (!defined('ECHRNG')) {
    define('ECHRNG', 44);
}
if (!defined('EL2NSYNC')) {
    define('EL2NSYNC', 45);
}
if (!defined('EL3HLT')) {
    define('EL3HLT', 46);
}
if (!defined('EL3RST')) {
    define('EL3RST', 47);
}
if (!defined('ELNRNG')) {
    define('ELNRNG', 48);
}
if (!defined('EUNATCH')) {
    define('EUNATCH', 49);
}
if (!defined('ENOCSI')) {
    define('ENOCSI', 50);
}
if (!defined('EL2HLT')) {
    define('EL2HLT', 51);
}
if (!defined('EBADE')) {
    define('EBADE', 52);
}
if (!defined('EBADR')) {
    define('EBADR', 53);
}
if (!defined('EXFULL')) {
    define('EXFULL', 54);
}
if (!defined('ENOANO')) {
    define('ENOANO', 55);
}
if (!defined('EBADRQC')) {
    define('EBADRQC', 56);
}
if (!defined('EBADSLT')) {
    define('EBADSLT', 57);
}
if (!defined('EDEADLOCK')) {
    define('EDEADLOCK', 35);
}
if (!defined('EBFONT')) {
    define('EBFONT', 59);
}
if (!defined('ENOSTR')) {
    define('ENOSTR', 60);
}
if (!defined('ENODATA')) {
    define('ENODATA', 61);
}
if (!defined('ETIME')) {
    define('ETIME', 62);
}
if (!defined('ENOSR')) {
    define('ENOSR', 63);
}
if (!defined('ENONET')) {
    define('ENONET', 64);
}
if (!defined('ENOPKG')) {
    define('ENOPKG', 65);
}
if (!defined('EREMOTE')) {
    define('EREMOTE', 66);
}
if (!defined('ENOLINK')) {
    define('ENOLINK', 67);
}
if (!defined('EADV')) {
    define('EADV', 68);
}
if (!defined('ESRMNT')) {
    define('ESRMNT', 69);
}
if (!defined('ECOMM')) {
    define('ECOMM', 70);
}
if (!defined('EPROTO')) {
    define('EPROTO', 71);
}
if (!defined('EMULTIHOP')) {
    define('EMULTIHOP', 72);
}
if (!defined('EDOTDOT')) {
    define('EDOTDOT', 73);
}
if (!defined('EBADMSG')) {
    define('EBADMSG', 74);
}
if (!defined('EOVERFLOW')) {
    define('EOVERFLOW', 75);
}
if (!defined('ENOTUNIQ')) {
    define('ENOTUNIQ', 76);
}
if (!defined('EBADFD')) {
    define('EBADFD', 77);
}
if (!defined('EREMCHG')) {
    define('EREMCHG', 78);
}
if (!defined('ELIBACC')) {
    define('ELIBACC', 79);
}
if (!defined('ELIBBAD')) {
    define('ELIBBAD', 80);
}
if (!defined('ELIBSCN')) {
    define('ELIBSCN', 81);
}
if (!defined('ELIBMAX')) {
    define('ELIBMAX', 82);
}
if (!defined('ELIBEXEC')) {
    define('ELIBEXEC', 83);
}
if (!defined('EILSEQ')) {
    define('EILSEQ', 84);
}
if (!defined('ERESTART')) {
    define('ERESTART', 85);
}
if (!defined('ESTRPIPE')) {
    define('ESTRPIPE', 86);
}
if (!defined('EUSERS')) {
    define('EUSERS', 87);
}
if (!defined('ENOTSOCK')) {
    define('ENOTSOCK', 88);
}
if (!defined('EDESTADDRREQ')) {
    define('EDESTADDRREQ', 89);
}
if (!defined('EMSGSIZE')) {
    define('EMSGSIZE', 90);
}
if (!defined('EPROTOTYPE')) {
    define('EPROTOTYPE', 91);
}
if (!defined('ENOPROTOOPT')) {
    define('ENOPROTOOPT', 92);
}
if (!defined('EPROTONOSUPPORT')) {
    define('EPROTONOSUPPORT', 93);
}
if (!defined('ESOCKTNOSUPPORT')) {
    define('ESOCKTNOSUPPORT', 94);
}
if (!defined('EOPNOTSUPP')) {
    define('EOPNOTSUPP', 95);
}
if (!defined('EPFNOSUPPORT')) {
    define('EPFNOSUPPORT', 96);
}
if (!defined('EAFNOSUPPORT')) {
    define('EAFNOSUPPORT', 97);
}
if (!defined('EADDRINUSE')) {
    define('EADDRINUSE', 98);
}
if (!defined('EADDRNOTAVAIL')) {
    define('EADDRNOTAVAIL', 99);
}
if (!defined('ENETDOWN')) {
    define('ENETDOWN', 100);
}
if (!defined('ENETUNREACH')) {
    define('ENETUNREACH', 101);
}
if (!defined('ENETRESET')) {
    define('ENETRESET', 102);
}
if (!defined('ECONNABORTED')) {
    define('ECONNABORTED', 103);
}
if (!defined('ECONNRESET')) {
    define('ECONNRESET', 104);
}
if (!defined('ENOBUFS')) {
    define('ENOBUFS', 105);
}
if (!defined('EISCONN')) {
    define('EISCONN', 106);
}
if (!defined('ENOTCONN')) {
    define('ENOTCONN', 107);
}
if (!defined('ESHUTDOWN')) {
    define('ESHUTDOWN', 108);
}
if (!defined('ETOOMANYREFS')) {
    define('ETOOMANYREFS', 109);
}
if (!defined('ETIMEDOUT')) {
    define('ETIMEDOUT', 110);
}
if (!defined('ECONNREFUSED')) {
    define('ECONNREFUSED', 111);
}
if (!defined('EHOSTDOWN')) {
    define('EHOSTDOWN', 112);
}
if (!defined('EHOSTUNREACH')) {
    define('EHOSTUNREACH', 113);
}
if (!defined('EALREADY')) {
    define('EALREADY', 114);
}
if (!defined('EINPROGRESS')) {
    define('EINPROGRESS', 115);
}
if (!defined('ESTALE')) {
    define('ESTALE', 116);
}
if (!defined('EUCLEAN')) {
    define('EUCLEAN', 117);
}
if (!defined('ENOTNAM')) {
    define('ENOTNAM', 118);
}
if (!defined('ENAVAIL')) {
    define('ENAVAIL', 119);
}
if (!defined('EISNAM')) {
    define('EISNAM', 120);
}
if (!defined('EREMOTEIO')) {
    define('EREMOTEIO', 121);
}
if (!defined('EDQUOT')) {
    define('EDQUOT', 122);
}
if (!defined('ENOMEDIUM')) {
    define('ENOMEDIUM', 123);
}
if (!defined('EMEDIUMTYPE')) {
    define('EMEDIUMTYPE', 124);
}
if (!defined('ECANCELED')) {
    define('ECANCELED', 125);
}
if (!defined('ENOKEY')) {
    define('ENOKEY', 126);
}
if (!defined('EKEYEXPIRED')) {
    define('EKEYEXPIRED', 127);
}
if (!defined('EKEYREVOKED')) {
    define('EKEYREVOKED', 128);
}
if (!defined('EKEYREJECTED')) {
    define('EKEYREJECTED', 129);
}
if (!defined('EOWNERDEAD')) {
    define('EOWNERDEAD', 130);
}
if (!defined('ENOTRECOVERABLE')) {
    define('ENOTRECOVERABLE', 131);
}
if (!defined('ERFKILL')) {
    define('ERFKILL', 132);
}
if (!defined('EHWPOISON')) {
    define('EHWPOISON', 133);
}
if (!defined('ENOTSUP')) {
    define('ENOTSUP', 95);
}
