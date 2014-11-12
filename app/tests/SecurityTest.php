<?php

class SecurityTest extends TestCase {

    // PHPInfo() should only be accessible to admin level or above
    public function test_phpinfo_route_is_only_available_to_admin_or_above() {

        // 404 PNF error should be returned if we're not able to see the message
        //$this->assertResponseStatus(404);

    }

}