<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['quotation-confirmation/(:any)']             = 'email/pay_now_for_quotation/$1';
$route['die-approval/(:any)']                       = 'home/die_approval/$1';
$route['transactionregistration.php']               = 'shopping/checkout';
$route['(:any)-sheets/(:any)/(t:num)']              = 'home/material/$3';
$route['users/forgotpassword']                      = 'users/forgotPassword';
$route['roll-labels/([a-z]+)/(c:any)']              = 'home/material/$2';
$route['shopping/orderconfirmation']                = 'shopping/orderConfirmation';
$route['integrated-labels/(t:num)']                 = 'home/integrated_detail/$1';

$route['custom-label-tool/([a-zA-Z\-]+)']           = 'home/labeldesigner/shape/$1';
$route['custom-label-tool/(.*)']                    = 'home/labeldesigner/$1';
$route['custom-label-tool']                         = 'home/labeldesigner';
$route['custom-label-tool-help']                    = 'home/design_help';

$route['sakina-al-shifa-clinic.php']                = 'home/sakina_alshifa';


$route['default_controller']                        = "home";
$route['advancesearch']                             = 'home/labelfinder';
$route['thermal-printer-roll-labels']               = 'home/searchby_printer';
$route['shoppingcart.php']                          = 'shopping';

$route['single-integrated-labels']                  = 'home/integrated/T406';
$route['double-integrated-labels']                  = 'home/integrated/T407';
$route['triple-integrated-labels']                  = 'home/integrated/T408';
$route['full-sheet-integrated-labels']              = 'home/integrated/T813';
$route['integrated-labels/(T:num)']                 = 'home/integrated_detail/$1';
$route['integrated-labels/(.*)']                    = 'home/integrated/$1/yes';
$route['integrated-labels']                         = 'home/integrated';
$route['delivery']                                  = 'home/delivery';
$route['faq']                                       = 'home/faq';

$route['avery-sized-labels']                        = 'home/avery_size_labels';
$route['Averylabels(:any)']                         = 'home/avery_size_labels';
$route['contact_us']                                = 'home/contactus';

$route['privacy-policy']                            = 'home/privacy';

$route['aboutus']                                   = 'home/aboutus';
//$route['printing']                                = 'home/printing';
$route['customlabels(:any)']                        = 'home/customlabels';

$route['newsletter.php']                            = 'home/newsletter';
$route['testmonialdetail.php']                      = 'home/testimonial';
$route['customer-care']                             = 'home/customer_care';
$route['sitemap']                                   = 'home/sitemap';

$route['terms-and-conditions']                      = 'home/termsConditions';
$route['termsConditions']                           = 'home/termsConditions';
$route['contact-us']                                = 'home/contactus';

$route['search']                                    = 'home/searchResults';
$route['download/(:any)/(:any)']                    = 'ajax/download/$1/$2';

$route['labels-by-application']                     = 'home/applicationlabels';

$route['404_override']                              = 'home/my404';


$route['free-templates']                            = 'home/freeTemplates';
$route['free-templates/(:any)']                     = 'home/freeTemplates/$1';
$route['freeTemplates']                             = 'home/freeTemplates';
$route['freeTemplates/(:any)']                      = 'home/freeTemplates/$1';

$route['labels-materials']                          = 'home/material_info';
$route['transactionRegistration.php']               = 'shopping/checkout';

/********new Url Strurtre***************/
$route['templates/(:any)']                          = 'selector/category/$1';
$route['templates']                                 = 'selector/category';
$route['(:any)-sheets/(:any)/(T:num)']              = 'home/material/$3';

$route['a5-sheets']                                 = 'home/category/A5';
$route['a5-sheets/(:any)']                          = 'home/category/A5/$1';

$route['a4-sheets']                                 = 'home/category/A4';
$route['a4-sheets/(:any)']                          = 'home/category/A4/$1';

$route['a3-sheets']                                 = 'home/category/A3';
$route['a3-sheets/(:any)']                          = 'home/category/A3/$1';

$route['sra3-sheets']                               = 'home/category/SRA3';
$route['sra3-sheets/(:any)']                        = 'home/category/SRA3/$1';
$route['roll-labels/([a-z]+)/(c:any)']              = 'home/material/$2';
$route['roll-labels/([a-z]+)/(C:any)']              = 'home/material/$2';
$route['roll-labels']                               = 'home/category/Roll';


$route['roll-labels/([a-z]+)']                      = 'home/category/Roll/$1';
$route['core-values']                               = 'home/email_note';


/**********************new Category Chanages*********************************/

$route['Integrated+Labels-(T:num)']                 = 'home/integrated';

$route['polyester-labels']                          = 'home/jarlabels';
$route['jam-jar-labels']                            = 'home/jarlabels';
$route['herb-spice-jar-labels']                     = 'home/jarlabels';
$route['sweet-jar-labels']                          = 'home/jarlabels';
$route['honey-jar-labels']                          = 'home/jarlabels';

//$route['customer-feedback'] = 'home/questionaire';
//$route['customer-feedback'] = 'home/my404';
$route['customer-feedback']                             = 'home';
$route['half-price-christmass-Address-Labels']          = 'home/christmiss';
$route['unsubscribe-from-aalabels-newsletter-(:any)']   = 'home/unsubscribe_xms_news/$1';
$route['half-price-christmass-Address-Labels-(:num)']   = 'home/christmiss/$1';
$route['redeem-voucher-code-aalabels-(:any)']           = 'home/vouchercode/$1';
$route['promotions'] = 'home/promotions';


$route['custom-label-tool/(.*)']                    = 'home/labeldesigner/$1';
$route['custom-label-tool']                         = 'home/labeldesigner';
$route['custom-label-tool-help']                    = 'home/design_help';

$route['labels-and-environment']                    = 'home/labels_and_environment';

$route['wholesale']                                 = 'wholesale/index';
$route['wholesale/quote-confirm']                   = 'wholesale/quote_confirm';
$route['wholesale/view-quotation']                  = 'wholesale/quotation';
$route['wholesale/view-products']                   = 'wholesale/products';
$route['wholesale/view-products/(:any)']            = 'wholesale/products/$1';

$route['attachments/(:any)']                        = 'ajax/attachments/$1';


$route['labels-by-application']                     = 'home/applicationlabels';
#$route['labels-by-application/(:any)/(:any)/(t:num)']  = 'home/applicationlabels/2/$2/$3';
$route['labels-by-application/(:any)/(t:num)']      = 'home/applicationlabels/1/$1/$2';
$route['labels-by-application/(:any)/(:any)']       = 'home/applicationlabels/1/$2';
$route['labels-by-application/(:any)']              = 'home/applicationlabels/1/$1';

$route['printed-labels']                            = 'home/print_service';
$route['material-printed-labels']                   = 'home/material_print_service';
$route['printed-labels/(:any)']                     = 'home/print_service/$1';


$route['printing']                                  = 'home/print_service';
$route['online-printing']                           = 'home/print_service';
$route['artwork-approval/(:any)']                   = 'home/artwork_approval/$1/en';
$route['approbation-dauvres-dart/(:any)']           = 'home/artwork_approval/$1/fr';
$route['artwork-guidelines']                        = 'home/artwork_help';

$route['english-version/(:any)']                    = 'email/order_confirm/$1/en';
$route['version-anglaise/(:any)']                   = 'email/order_confirm/$1/fr';

$route['newsletter-archive']                        = 'home/newsletter_archive';
$route['newsletter-archive/(:any)']                 = 'home/newsletter_archive/$1';

$route['barcode-and-qrcode-generator']              = 'home/barcode';



$route['material-on-sheets/(:any)/products']        ='home/material_specification/sheets/$1/products';
$route['material-on-sheets/(:any)']                 ='home/material_specification/sheets/$1';

$route['material-on-rolls/(:any)/products']         ='home/material_specification/rolls/$1/products';
$route['material-on-rolls/(:any)']                  ='home/material_specification/rolls/$1';

$route['labels-by-adhesive-rolls/(:any)']           ='home/label_by_adhesive/rolls/$1';
$route['labels-by-adhesive-sheets/(:any)']          ='home/label_by_adhesive/sheets/$1';


$route['sample-request/rolls']                      = 'home/free_sample/rolls';
$route['sample-request/sheets']                     = 'home/free_sample/sheets';
$route['specialist-label-material']                 = 'home/specialist_labels';


$route['shopping/payment-authorization']            = 'shopping/hostedpaypal';

$route['free-label-design-templates']                       = 'home/lba_labels';
$route['free-label-design-templates/(:any)/(:any)/(:num)']  = 'home/lba_editor/$1/$2/$3';
$route['free-label-design-templates/(:any)/l(:num)']        = 'home/lba_labels/$1/$2';
$route['free-label-design-templates/(:any)']                = 'home/lba_labels/$1';




$route['special-offer-materials']                   = 'home/special_offer_materials';
$route['hs-codes']                                  = 'home/hs_codes';
$route['piggy-back-labels']                         = 'home/piggy_back_labels';
$route['unsubcribe-from-reviews/(:any)']            = 'ajax/gmb_unsubscribe/$1';

$route['blog/(:any)']                               = 'home/blog/$1';
$route['blog']                                      = 'home/blog';


//$route['christmas-labels'] = 'home/christmas';

//$route['christmas-labels'] = 'home/christmas';


/* End of file routes.php */
/* Location: ./application/config/routes.php */