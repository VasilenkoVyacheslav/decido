<?php

namespace Premmerce\Filter\Updates;

use  Premmerce\Filter\Seo\SeoModel ;
use  Premmerce\Filter\Seo\SeoTermModel ;
class Updater
{
    const  CURRENT_VERSION = '2.0' ;
    const  DB_OPTION = 'premmerce_filter_db_version' ;
    public function checkForUpdates()
    {
        return $this->compare( self::CURRENT_VERSION );
    }
    
    private function compare( $version )
    {
        $dbVersion = get_option( self::DB_OPTION, '1.1' );
        return version_compare( $dbVersion, $version, '<' );
    }
    
    public function update()
    {
        
        if ( $this->checkForUpdates() ) {
            $this->installDb();
            foreach ( $this->getUpdates() as $version => $callback ) {
                if ( $this->compare( $version ) ) {
                    call_user_func( $callback );
                }
            }
        }
    
    }
    
    public function installDb()
    {
    }
    
    public function getUpdates()
    {
        return array(
            '2.0' => array( $this, 'update2_0' ),
        );
    }
    
    public function update2_0()
    {
        update_option( self::DB_OPTION, '2.0' );
    }

}