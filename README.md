# OXID ERP API Plugin for OXUSERPAYMENT informations

## General Information

*Oxid_ErpPaymentInfo* is a erp plugin for all OXID eShop editions.

## Installation

### Step 1: Prepare for Installation

Log into the admin panel, go to *Extensions → Modules → ERP* and press the *Deactivate* button.

### Step 2: Get the source code

Download the appropriate branch (in general ``master``.

Copy all files of ``CopyThis`` to: 

* ``DOCUMENT_ROOT/`` for OXID eShop version 4.10/5.3
* ``DOCUMENT_ROOT/source/`` for OXID eShop compilation v6

### Step 3: Activate plugin 

Log into the admin panel, go to *Extensions → Modules → ERP* and press the *Activate* button. Clean the cache and test the Plugin.

## API Plugin call

For test calls we recommend to use *"Restlet Client - REST API Testing":https://chrome.google.com/webstore/detail/restlet-client-rest-api-t/aejoelaoggembcahagimdiliamlcdmfm* and to use the following SOAP Envelope: 

	```
	<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
		 <SOAP-ENV:Body>
			  <OXERPCallPlugin xmlns="OXERPService">
					<sSessionID>### SESSION ID ###</sSessionID>
					<aRequestData>
					  <OXERPType>
						 <aResult>
							<ArrayOfString>
							   <string>sOrderId</string>
							   <string>### OXID ###</string>
							</ArrayOfString>
						 </aResult>
					  </OXERPType>
					</aRequestData>
					<sPluginName>WmdkPaymentInfoPlugin</sPluginName>
			  </OXERPCallPlugin>
		 </SOAP-ENV:Body>
	</SOAP-ENV:Envelope>
	```

## Issues

Please report all issues to https://github.com/wmdk/Oxid_ErpPaymentInfo/issues for the project **Oxid_ErpPaymentInfo**.

## License

Check https://github.com/wmdk/Oxid_ErpPaymentInfo/blob/master/LICENSE for current licence informations.

## Imprint

*Kussin | eCommerce und Online-Marketing*
Telefon: +49 (4101) 85868 - 0
Telefax: +49 (4101) 85868 - 29
Email: info@kussin.de 
URL: www.kussin.de

Unser Know-how für Ihr Geschäft:
eCommerce
Web Design
Web Entwicklung
Online Marketing

Sie erhalten diese E-Mail von der
Kussin | eCommerce und Online-Marketing GmbH
Fahltskamp 3 in 25421 Pinneberg
Geschäftsführer: Daniel Kussin 
Eingetragen beim Amtsgericht Pinneberg, HRA 8305 PI
USt-IdNr. DE320729440
