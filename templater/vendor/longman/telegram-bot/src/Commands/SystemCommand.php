<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands;

use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;

abstract class SystemCommand extends Command
{
    /**
     * @{inheritdoc}
     *
     * Set to empty string to disallow users calling system commands.
     */
    protected $usage = '';

    /**
     * A system command just executes
     *
     * Although system commands should just work and return a successful ServerResponse,
     * each system command can override this method to add custom functionality.
     *
     * @return ServerResponse
     */
    public function execute()
    {
        //System command, return empty ServerResponse by default
        return Request::emptyResponse();
    }
}
