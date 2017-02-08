<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Clark Tomlinson <fallen013@gmail.com>
 * @author Florian Pritz <bluewind@xinu.at>
 * @author Frank Karlitschek <frank@karlitschek.de>
 * @author Individual IT Services <info@individual-it.net>
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Luke Policinski <lpolicinski@gmail.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roman Geber <rgeber@owncloudapps.com>
 * @author TheSFReader <TheSFReader@gmail.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
\OC::$server->getSession()->close();

// Firefox and Konqueror tries to download application/json for me.  --Arthur
OCP\JSON::setContentTypeHeader('text/plain');

// If a directory token is sent along check if public upload is permitted.
// If not, check the login.
// If no token is sent along, rely on login only

\OC::$server->getLogger()->alert("filededup test:  -----------------------------------------", array('app' => 'files'));

$result = array();
$target = '\/id_rsa.pub';
$meta = \OC\Files\Filesystem::getFileInfo($target);
$data = \OCA\Files\Helper::formatFileInfo($meta);
$data['status'] = 'success';
$data['originalname'] = 'id_rsa.pub';
$data['uploadMaxFilesize'] = 537919488;
$data['maxHumanFilesize'] = '513 M';
$data['permissions'] = meta['permissions'];
$data['directory'] = '\/';
$result[] = $data;

\OC::$server->getLogger()->alert("filededup test 1:  -----------------------------------------", array('app' => 'files'));
OCP\JSON::encodedPrint($result);
