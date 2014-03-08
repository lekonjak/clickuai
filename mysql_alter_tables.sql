# Add a constraint to index state to cities and states to countries
ALTER TABLE `cities` ADD CONSTRAINT `fk_state` FOREIGN KEY ( `zone_id` ) REFERENCES `states` ( `zone_id` ) ;
ALTER TABLE `states` ADD CONSTRAINT `fk_country` FOREIGN KEY ( `zone_country_id` ) REFERENCES `countries` ( `countries_id` ) ;

# Alter Engine 
ALTER TABLE cities ENGINE=InnoDB;
ALTER TABLE states ENGINE=InnoDB;
ALTER TABLE countries ENGINE=InnoDB;

# Table users with utf8
ALTER TABLE users DEFAULT CHARACTER SET utf8;