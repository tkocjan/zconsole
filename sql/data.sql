-- Insert data into the tables
INSERT INTO UserRec VALUES (
  1, -- `id`
  'tkocjan@yahoo.com', -- `email`
  SHA1(CONCAT('password', MD5('123456'))), -- `password` 
  MD5('123456'), -- `salt` 
  'customer' -- `role` 
), (
  2, -- `id`
  'john@doe.com', -- `email`
  SHA1(CONCAT('password', MD5('123456'))), -- `password` 
  MD5('123456'), -- `salt` 
  'customer' -- `role` 
);

INSERT INTO CustomerRec VALUES (
  1, -- id
  # email
  # password
  'Tom', -- firstName         
  'Kocjan', -- lastName          
  1 -- addressId  
),(
  2, -- id
  # email
  # password
  'John', -- firstName         
  'Doe', -- lastName          
  2 -- addressId  

);

INSERT INTO AddressRec VALUES (
  1,                    -- id
  '5850 Corinth Dr',     -- line1
  NULL,                 -- line2
  'Colorado Springs',    -- city
  'CO',                  -- state
  '80923'               -- zip
),(
  2,                    -- id
  '1313 Mockingbird Ln',     -- line1
  NULL,                 -- line2
  'Scary',    -- city
  'CA',                  -- state
  '12345'               -- zip
);

INSERT INTO ServerRec VALUES (
  1,    -- id                
  1,    -- customerId                
  'inf-empty',    -- server_name             
  true,    -- imported          
  '',    -- notes             
  'Stopped',    -- status            
  1,    -- os_type_id        
  1,    -- server_type_id    
  10,    -- disk_size         
  2,    -- location_id       
  1,    -- cloud_account_id  
  2,    -- app_id          
  '0000-00-00 00:00:00',    -- latest_backup     
  '184.169.178.182',    -- public_ip         
  'www',    --   public_dns        
  'user',    -- app_login         
  'password',    -- app_password      
  '2012-10-03 18:11:51',    -- date_created      
  '2012-10-05 23:11:39',    -- last_start        
  '2012-10-05 23:09:46',    -- last_stop   
  'i-950ac4cc',         -- hosterServerCode      
  '10.170.133.174',    -- private_ip        
  false,    -- termination_protect   
  false      -- active
), (
  2,    -- id                
  1,    -- customerId                
  'Ubu JBoss7',    -- server_name             
  true,    -- imported          
  'inFusion JBoss Stack',    -- notes             
  'Stopped',    -- status            
  1,    -- os_type_id        
  1,    -- server_type_id    
  10,    -- disk_size         
  2,    -- location_id       
  1,    -- cloud_account_id  
  1,    -- app_id          
  '0000-00-00 00:00:00',    -- latest_backup     
  '184.169.178.182',    -- public_ip         
  'www',    --   public_dns        
  'user',    -- app_login         
  'password',    -- app_password      
  '2012-10-03 18:11:51',    -- date_created      
  '2012-10-05 23:11:39',    -- last_start        
  '2012-10-05 23:09:46',    -- last_stop   
  'i-950ac4cc',         -- hosterServerCode      
  '10.170.133.174',    -- private_ip        
  false,    -- termination_protect   
  true      -- active
), (
  3,    -- id                
  1,    -- customerId                
  'Ubu WordPress',    -- server_name             
  false,    -- imported          
  'inFusion Wordpress 3.4.2-0',    -- notes             
  'Running',    -- status            
  1,    -- os_type_id        
  1,    -- server_type_id    
  10,    -- disk_size         
  2,    -- location_id       
  1,    -- cloud_account_id  
  2,    -- app_id          
  '2012-10-05 23:09:46',    -- latest_backup     
  '184.169.178.182',    -- public_ip         
  'aws',    --   public_dns        
  'user',    -- app_login         
  'password',    -- app_password      
  '2012-10-03 18:11:51',    -- date_created      
  '2012-10-05 23:11:39',    -- last_start        
  '2012-10-05 23:09:46',    -- last_stop         
  'i-951ac4cd',         -- hosterServerCode      
  '10.170.133.174',    -- private_ip        
  false,    -- termination_protect   
  true      -- active
),(
  4,    -- id                
  2,    -- customerId                
  'Ubu JBoss7',    -- server_name             
  true,    -- imported          
  'inFusion JBoss Stack',    -- notes             
  'Stopped',    -- status            
  1,    -- os_type_id        
  1,    -- server_type_id    
  10,    -- disk_size         
  2,    -- location_id       
  3,    -- cloud_account_id  
  1,    -- app_id          
  '0000-00-00 00:00:00',    -- latest_backup     
  '184.169.178.182',    -- public_ip         
  'johnjboss',    --   public_dns        
  'user',    -- app_login         
  'password',    -- app_password      
  '2012-10-03 18:11:51',    -- date_created      
  '2012-10-05 23:11:39',    -- last_start        
  '2012-10-05 23:09:46',    -- last_stop   
  'i-950ac4cc',         -- hosterServerCode      
  '10.170.133.174',    -- private_ip        
  false,    -- termination_protect   
  true      -- active
);

INSERT INTO CloudAccountRec VALUES (
    1,     -- id
    1,     -- customer_id
    'My AWS Account',     -- account_name
    'Active', --  status
     1,     --  hoster_id
     '599124674397',    --  hoster_acount_code
     2,     --  default_location
     '2012-10-02 22:17:39',   --  date_created
    true, -- isDefaultAccount,
    'awsAccessKeyId', -- accessKeyId,
    'awsSecretAccessKey'  -- secretAccessKey  
),(
    2,     -- id
    1,     -- customer_id
    'My Rax Account',     -- account_name
    'Active', --  status
     2,     --  hoster_id
     'myRaxAccountCode',    --  hoster_acount_code
     9,     --  default_location
     '2012-10-02 22:17:39',   --  date_created
    false, -- isDefaultAccount,
    'myRaxAccessKeyId', -- accessKeyId,
    'myRaxSecretAccessKey'  -- secretAccessKey  
),(
    3,     -- id
    2,     -- customer_id
    'John''s AWS Account',     -- account_name
    'Active', --  status
     1,     --  hoster_id
     'johnAwsAccountCode',    --  hoster_acount_code
     2,     --  default_location
     '2012-10-02 22:17:39',   --  date_created
    true, -- isDefaultAccount,
    'johnAwsAccessKeyId', -- accessKeyId,
    'johnAwsSecretAccessKey'  -- secretAccessKey  
);

INSERT INTO BackupRec VALUES
(1, 1, '2012-10-02 22:17:39');

INSERT INTO AppType VALUES
(1, 'None', 'No Application Installed', '', 'linux-platform.png', ''),
(2, 'WordPress', 'WordPress 3.4.2-0', '/wp-admin', 'stack-wordpress.png', 
    'WordPress is a state-of-the-art publishing platform with a focus on aesthetics, web standards, and usability. WordPress is both free and priceless at the same time. The project was started in 2003. Since then it has grown to be the largest self-hosted blogging tool in the world, used on millions of sites and seen by tens of millions of people every day.'
),
(3, 'Drupal', 'Drupal 6.26-0', '/admin', 'stack-drupal.png',
    'Drupal is a content management platform that allows an individual or community of users to easily publish, manage, and organize a wide variety of content on a website. In general, Drupal is used for community web portals, discussion sites, corporate web sites, intranet applications, personal web sites or blogs, aficionado sites, e-commerce applications, resource directories, and social networking sites. Drupal is easy to extend by plugging in one or more of the dozens of freely available modules.'
),
(4, 'Drupal', 'Drupal 7.17-0', '/admin', 'stack-drupal.png',
    'Drupal is a content management platform that allows an individual or community of users to easily publish, manage, and organize a wide variety of content on a website. In general, Drupal is used for community web portals, discussion sites, corporate web sites, intranet applications, personal web sites or blogs, aficionado sites, e-commerce applications, resource directories, and social networking sites. Drupal is easy to extend by plugging in one or more of the dozens of freely available modules.'
),
(5, 'Joomla!', 'Joomla! 2.5.8-0', '/admin', 'stack-joomla.png',
    'Joomla! is an open source Content Management System with a growing and active community of more than 400,000 users. Joomla! creates multiple format sites from simple websites to complex corporate applications and allows users to manage each aspect of their website through a simple, browser-based interface. Once Joomla! is up and running, users with basic word processing skills can add or edit content, update images, and to manage the critical data. Joomla! also allows developers to create and include add-ons to further customize their site.'
),
(6, 'Joomla!', 'Joomla! 3.0.2-0', '/admin', 'stack-joomla.png',
        'Joomla! is an open source Content Management System with a growing and active community of more than 400,000 users. Joomla! creates multiple format sites from simple websites to complex corporate applications and allows users to manage each aspect of their website through a simple, browser-based interface. Once Joomla! is up and running, users with basic word processing skills can add or edit content, update images, and to manage the critical data. Joomla! also allows developers to create and include add-ons to further customize their site.'
);

INSERT INTO OSType VALUES
(1, 56, 64, 'Ubuntu 12.04', 'Ubuntu Linux', 'Ubuntu Linux 12.04 LTS', '12.04 LTS', 'os-ubuntu.gif', 'component-ubuntu.png'),
(2, 57, 32, 'Ubuntu 12.04', 'Ubuntu Linux', 'Ubuntu Linux 12.04 LTS', '12.04 LTS', 'os-ubuntu.gif', 'component-ubuntu.png'),
(3, 58, 64, 'Ubuntu 10.04', 'Ubuntu Linux', 'Ubuntu Linux 10.04 LTS', '10.04 LTS', 'os-ubuntu.gif', 'component-ubuntu.png'),
(4, 59, 32, 'Ubuntu 10.04', 'Ubuntu Linux', 'Ubuntu Linux 10.04 LTS', '10.04 LTS', 'os-ubuntu.gif', 'component-ubuntu.png'),
(5, 27, 64, 'Fedora 14', 'Fedora Linux', 'Fedora Linux 14', '14', 'os-fedora.gif', 'component-fedora.png'),
(6, 26, 32, 'Fedora 14', 'Fedora Linux', 'Fedora Linux 14', '14', 'os-fedora.gif', 'component-fedora.png'),
(7, 54, 64, 'RedHat 6.3', 'RedHat Linux', 'RedHat Linux 6.3', '6.3', 'os-redhat.gif', 'component-redhat.png'),
(8, 55, 32, 'RedHat 6.3', 'RedHat Linux', 'RedHat Linux 6.3', '6.3', 'os-redhat.gif', 'component-redhat.png'),
(9, 52, 64, 'Amazon', 'Amazon Linux', 'Amazon Linux 2012.09.0', '2012.09.0', 'amazon_icon_20x20.gif', 'component-amazon.png'),
(10, 53, 32, 'Amazon', 'Amazon Linux', 'Amazon Linux 2012.09.0', '2012.09.0', 'amazon_icon_20x20.gif', 'component-amazon.png');

INSERT INTO HosterType VALUES
(1, 'Amazon EC2', 2, 1, 'target-aws.png', 'component-amazon.png', 0.11),
(2, 'Rackspace VPN', 9, 1, 'target-rax-20.gif', 'logo-rax.gif', 0.12);

INSERT INTO LocationType VALUES
(1, 1, 'US', 'US East Coast (Virginia)', 'us.png', 'us-flag.png'),
(2, 1, 'US', 'US West Coast (N. California)', 'us.png', 'us-flag.png'),
(3, 1, 'US', 'US West Coast (Oregon)', 'us.png', 'us-flag.png'),
(4, 1, 'Europe', 'Europe (Ireland)', 'europeanunion.png', 'eu-flag.png'),
(5, 1, 'Asia Pacific', 'Asia Pacific (Singapore)', 'sg.png', 'singapore-flag.png'),
(6, 1, 'Asia Pacific', 'Asia Pacific (Sydney)', 'au.png', 'australia-flag.png'),
(7, 1, 'Asia Pacific', 'Asia Pacific (Tokyo)', 'jp.png', 'japan-flag.png'),
(8, 1, 'South America', 'South America (Sao Paulo)', 'br.png', 'sa-flag.png'),
(9, 2, 'US', 'US Texas (San Antonio)', 'us.png', 'us-flag.png');

INSERT INTO ServerType VALUES
(1, 1, 't1.micro',     18.00,    'Micro',         'Micro (t1.micro, 613MB RAM, Up to 2 Cores)', 'server-t1.micro.png', 
    1, 613, 
    'Micro servers are a cost-effective way to host low-traffic PHP-based applications such as Drupal, Wordpress.'),
(2, 1, 'm1.small',     64.80,    'Small',        'Small (m1.small, 1.7GB RAM, 1 Cores)', 'server-m1.small.png', 
    1, 1700,
    'Small servers are suitable for hosting PHP-based applications and low-traffic Rails or Java applications such as Alfresco or Redmine.' ),
(3, 1, 'm1.medium',    129.60,    'Medium',       'Medium (m1.medium, 3.75GB RAM, 2 Cores)', 'server-m1.medium.png', 
    2, 3750,
    'Medium servers are suitable for hosting PHP-based applications and low-traffic Rails or Java applications such as Alfresco or Redmine.' ),
(4, 1, 'c1.medium',    133.92,    'High CPU Medium', 'High CPU Medium (c1.medium, 1.7GB RAM, 5 Cores)', 'server-c1.medium.png', 
    5, 1700,
    'High CPU Medium servers are suitable for hosting PHP-based applications and low-traffic Rails or Java applications such as Alfresco or Redmine.' ),
(5, 1, 'm1.large',     259.20,    'Large',        'Large (m1.large, 7.5GB RAM, 4 Cores)', 'server-m1.large.png', 
    4, 7500,
    ' Large servers are great for hosting PHP, Rails or Java-based applications.' ),
(6, 1, 'm1.xlarge',    364.32,    'Extra Large',  'Extra Large (m1.xlarge, 15.1GB RAM, 8 Cores)', 'server-m1.xlarge.png', 
    8, 15000,
    'Extra Large servers are suitable for hosting PHP, Rails or Java-based applications with significant traffic.'),
(7, 1, 'm2.xlarge',    518.40,    'High Mem XL',  'High Mem XL (m2.xlarge, 17.1GB RAM, 6.5 Cores)', 'server-m2.xlarge.png',
    6, 17100,
     'High Mem XL servers are suitable for hosting PHP, Rails or Java-based applications with significant traffic. In most scenarios such a powerful instance type is not necessary.'),
(8, 1, 'c1.xlarge',    535.68,    'High CPU XL',  'High CPU XL (c1.xlarge, 7.1GB RAM, 21 Cores)', 'server-c1.xlarge.png',
    20, 7000,
    'High CPU Extra servers are suitable for hosting PHP, Rails or Java-based applications with significant traffic.'),
(9, 1, 'm2.2xlarge',   728.64,    'High Mem XXL', 'High Mem XXL (m2.2xlarge, 34.2GB RAM, 13 Cores)', 'server-m2.2xlarge.png',
    13, 34200,
    'High Mem XXL servers are suitable for hosting PHP, Rails or Java-based applications with significant traffic. In most scenarios such a powerful instance type is not necessary.'),
(10, 1, 'm2.4xlarge',  1457.28,    'High Mem 4XL', 'High Mem 4XL (m2.4xlarge, 68.4GB RAM, 26 Cores)', 'server-m2.4xlarge.png',
    26, 68400,
    'High Mem 4XL servers are suitable for hosting PHP, Rails or Java-based applications with significant traffic. In most scenarios such a powerful instance type is not necessary.');
# (11, 2, 'rax.micro',     18.00,    'Micro',         'Micro (t1.micro, 613MB RAM, Up to 2 Cores)', 'server-t1.micro.png', 
#     1, 613, 
#     'Micro servers are a cost-effective way to host low-traffic PHP-based applications such as Drupal, Wordpress.'),
