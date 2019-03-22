<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware.Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HWI\Bundle\OAuthBundle\OAuth\ResourceOwner;

use HWI\Bundle\OAuthBundle\Security\Core\Authentication\Token\OAuthToken;
use Symfony\Component\HttpFoundation\Request as HttpRequest;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestStubResourceOwner extends GenericOAuth2ResourceOwner
{
    public const THE_RETURNED_ACCESS_TOKEN = 'd5d776ca-4c89-11e9-8646-d663bd873d93';

    public function getAccessToken(HttpRequest $request, $redirectUri, array $extraParameters = array())
    {
        return self::THE_RETURNED_ACCESS_TOKEN;
    }

    public function getUserInformation(array $accessToken, array $extraParameters = array())
    {
        $response = $this->getUserResponse();
        $response->setResourceOwner($this);
        $response->setOAuthToken(new OAuthToken($accessToken));

        return $response;
    }
}
