<?php
	require_once(TOOLKIT . '/email-gateways/email.smtp.php');
	
	
	/**
	 * Custom Email Gateway
	 *
	 * @author Jon Mifsud
	 */
	Class MandrillSMTPGateway extends SMTPGateway{
	
		/**
		 * Returns the name, used in the dropdown menu in the preferences pane.
		 *
		 * @return array
		 */
		public static function about(){
			return array(
				'name' => __('Mandrill SMTP'),
			);
		}
		
		/**
		 * Send an email using an SMTP server + Add CC + BCC recipients
		 *
		 * @return boolean
		 */
		public function send(){
				
			//override reciepient if server not in production - should allow this line to be changed + email to be inserted from config
			if (Symphony::Configuration()->get('status','server')!='live' ) {
				$this->_subject	 = '[TestMail] ' . $this->_subject;
				$this->_recipients = array('Test Recipient' => Symphony::Configuration()->get('test-recipient','mandrill'));
			}

			$mandrillOptions = Symphony::Configuration()->get('mandrill');

			$this->_header_fields['X-MC-Important'] = $mandrillOptions['X-MC-Important'];
			$this->_header_fields['X-MC-Subaccount'] = $mandrillOptions['X-MC-Subaccount'];

			//parent send
			return parent::send();
		}
		
	}