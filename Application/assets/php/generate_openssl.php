<?php
$common = $_POST['commonname'];
//$common = 'ddeeee';
$str = "#
# OpenSSL example configuration file.
# This is mostly being used for generation of certificate requests.
#

# This definition stops the following lines choking if HOME isn\'t
# defined.
HOME			= .
RANDFILE		= $ENV::HOME/.rnd

# Extra OBJECT IDENTIFIER info:
#oid_file		= $ENV::HOME/.oid
oid_section		= new_oids

[ new_oids ]

####################################################################
[ ca ]
default_ca	= CA_default		# The default ca section

####################################################################
[ CA_default ]

dir		= ./demoCA		# Where everything is kept
certs		= $dir/certs		# Where the issued certs are kept
crl_dir		= $dir/crl		# Where the issued crl are kept
database	= $dir/index.txt	# database index file.
#unique_subject	= no			# Set to \'no\' to allow creation of
					# several ctificates with same subject.
new_certs_dir	= $dir/newcerts		# default place for new certs.

certificate	= $dir/cacert.pem 	# The CA certificate
serial		= $dir/serial 		# The current serial number
crlnumber	= $dir/crlnumber	# the current crl number
					# must be commented out to leave a V1 CRL
crl		= $dir/crl.pem 		# The current CRL
private_key	= $dir/private/cakey.pem# The private key
RANDFILE	= $dir/private/.rand	# private random number file

x509_extensions	= usr_cert		# The extentions to add to the cert

name_opt 	= ca_default		# Subject Name options
cert_opt 	= ca_default		# Certificate field options


default_days	= 365			# how long to certify for
default_crl_days= 30			# how long before next CRL
default_md	= sha1			# which md to use.
preserve	= no			# keep passed DN ordering

policy		= policy_match

[ policy_match ]
countryName		= match
stateOrProvinceName	= match
organizationName	= match
organizationalUnitName	= optional
commonName		= supplied
emailAddress		= optional

[ policy_anything ]
countryName		= optional
stateOrProvinceName	= optional
localityName		= optional
organizationName	= optional
organizationalUnitName	= optional
commonName		= supplied
emailAddress		= optional

[ req ]
default_bits		= 1024
default_keyfile 	= privkey.pem
distinguished_name	= req_distinguished_name
attributes		= req_attributes
x509_extensions	= v3_ca	# The extentions to add to the self signed cert
string_mask = nombstr

[ req_distinguished_name ]
countryName			= Country Name (2 letter code)
countryName_default		= AU
countryName_min			= 2
countryName_max			= 2

stateOrProvinceName		= State or Province Name (full name)
stateOrProvinceName_default	= Some-State

localityName			= Locality Name (eg, city)

0.organizationName		= Organization Name (eg, company)
0.organizationName_default	= Internet Widgits Pty Ltd

organizationalUnitName		= Organizational Unit Name (eg, section)

commonName			= Common Name (eg, YOUR name)
commonName_max			= 64

0.commonName = Common Name (eg, YOUR name)
0.commonName_default = guzzoni.apple.com
0.commonName_max = 64
1.commonName = Common Name (eg, YOUR name)
1.commonName_default = $common
1.commonName_max = 64

emailAddress			= Email Address
emailAddress_max		= 64

[ req_attributes ]
challengePassword		= A challenge password
challengePassword_min		= 4
challengePassword_max		= 20

unstructuredName		= An optional company name

[ usr_cert ]

basicConstraints=CA:FALSE
nsComment			= \"OpenSSL Generated Certificate\"
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
[ v3_req ]

basicConstraints = CA:FALSE
keyUsage = nonRepudiation, digitalSignature, keyEncipherment

[ v3_ca ]
subjectKeyIdentifier=hash

authorityKeyIdentifier=keyid:always,issuer:always
basicConstraints = CA:true


[ crl_ext ]
authorityKeyIdentifier=keyid:always,issuer:always

[ proxy_cert_ext ]
basicConstraints=CA:FALSE
nsComment			= \"OpenSSL Generated Certificate\"

subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer:always
proxyCertInfo=critical,language:id-ppl-anyLanguage,pathlen:3,policy:foo ";


//echo $str;
$myfile = 'openssl.cnf';
echo $myfile;
$fh = fopen($myfile, 'w+') or die("can't open file");
fwrite($fh, $str);
fclose($fh);
exec('sudo /var/www/SiriProxy/copyconf.sh > /dev/null &');


?>
