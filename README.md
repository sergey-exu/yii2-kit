installation:
    <ul>
        <li>git clone https://github.com/sergey-exu/yii2-kit.git</li>
        <li>php init</li>
        <li>composer global require "fxp/composer-asset-plugin:~1.0.3"</li>
        <li>composer update</li>
        <li>set db connection in common/config/main-local.php</li>
        <li>
            set param in common/config/param-local.php
            <ul>
                <li>'domainName' => 'your full domain name'</li>
                <li>'gaTrackingId' => trackingId', //Google Analitics Tracking Id</li>
            </ul>
        </li>
        <li>php yii migrate</li>
    </ul>    
        
site.com/backend<br/>
        login: test<Br/>
        pass: testtest
    
