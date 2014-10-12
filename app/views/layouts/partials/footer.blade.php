<footer>
    @yield('PageFooter')
    <nav class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="about.php">All About Us</a></li>
            <li><a href="privarypolicy.php">Privacy Policy</a></li>
            <li><a href="{{ URL::route('home') }}">Home</a></li>
        </ul>
    </nav>
    <div class="col-md-12">
        <p>Unless otherwise indicated, all materials on these pages are copyrighted by Homes Store. All rights reserved. No part of these pages, either text or image may be used for any purpose other than personal use. Therefore, reproduction, modification, storage in a retrieval system or retransmission, in any form or by any means, electronic, mechanical or otherwise, for reasons other than personal use, is strictly prohibited without prior written permission.</p>
        <p>Property information provided by My Florida Regional MLS.</p>
        <p>IDX information is provided exclusively for consumers personal, noncommercial use, that it may not be used for any purpose other than to identify prospective properties consumers may be interested in purchasing, and that the data is deemed reliable but is not guaranteed accurate by the MLS. The MLS may, at its discretion, require use of other disclaimers as necessary to protect participants and/or the MLS from liability.</p>
    </div>
    <div class="col-lg-12 clearfix img-responsive">
        <div class="col-lg-2 col-lg-offset-2 clearfix">
            <a href="http://www.realtor.com"><img data-toggle="tooltip" data-original-title="realtor.com - where home happens" src="/images/logo/realtor.png" alt="Realtor"></a>
        </div>
        <div class="col-lg-2 col-lg-offset-4 clearfix">
            <a href="http://www.mfrmls.com"><img data-toggle="tooltip" data-original-title="My Florida Regional MLS" src="/images/logo/mls.png" alt="MFR MLS"></a>
        </div>
    </div>
</footer>