<?php

	Class Extension_Mandrill_Smtp extends Extension {

		public function getSubscribedDelegates() {
			return array(
				array(
					'page' => '/system/preferences/',
					'delegate' => 'AddCustomPreferenceFieldsets',
					'callback' => 'appendPreferences'
				),
				array(
					'page' => '/system/preferences/',
					'delegate' => 'Save',
					'callback' => 'savePreferences'
				)
			);
		}

		
		public function appendPreferences($context){
			// Show the Custom headers which will be appended
			$group = new XMLElement('fieldset');
			$group->setAttribute('class', 'cdi settings');
			$group->appendChild(new XMLElement('legend', 'Mandrill SMTP Options'));

			//email override + condition

			// Append preferences
			// $context['wrapper']->appendChild($group);
		}
		
		public function savePreferences($context){
			//save the updated user preferences
		}

	}
