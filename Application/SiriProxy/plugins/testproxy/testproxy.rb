require 'tweakSiri'
require 'siriObjectGenerator'

#######
# This is a "hello world" style plugin. It simply intercepts the phrase "text siri proxy" and responds
# with a message about the proxy being up and running. This is good base code for other plugins.
# 
# Remember to add other plugins to the "start.rb" file if you create them!
######


class TestProxy < SiriPlugin

	####
	# This gets called every time an object is received from the Guzzoni server
	def object_from_guzzoni(object, connection) 
		
		object
	end
		
	####
	# This gets called every time an object is received from an iPhone
	def object_from_client(object, connection)
		
		object
	end
	
	
	####
	# When the server reports an "unkown command", this gets called. It's useful for implementing commands that aren't otherwise covered
	def unknown_command(object, connection, command)
		if(command.match(/test siri proxy/i))
			self.plugin_manager.block_rest_of_session_from_server
			
			return generate_siri_utterance(connection.lastRefId, "Siri Proxy is up and running!")
		end	
		
		
		object
	end
	
	####
	# This is called whenever the server recognizes speech. It's useful for overriding commands that Siri would otherwise recognize
	def speech_recognized(object, connection, phrase)
		if(phrase.match(/siri proxy map/i))
			self.plugin_manager.block_rest_of_session_from_server
			
			connection.inject_object_to_output_stream(object)
			
			addViews = SiriAddViews.new
			addViews.make_root(connection.lastRefId)
			mapItemSnippet = SiriMapItemSnippet.new
			mapItemSnippet.items << SiriMapItem.new
			utterance = SiriAssistantUtteranceView.new("Testing map injection!")
			addViews.views << utterance
			addViews.views << mapItemSnippet
			
			connection.inject_object_to_output_stream(addViews.to_hash)
			
			requestComplete = SiriRequestCompleted.new
			requestComplete.make_root(connection.lastRefId)
			
			return requestComplete.to_hash
		end
		if(phrase.match(/Who is awesome/i))
			self.plugin_manager.block_rest_of_session_from_server
			
			return generate_siri_utterance(connection.lastRefId, "You are master Nick :P")
		end	
		if(phrase.match(/Who is the best lady of the evening/i))
			self.plugin_manager.block_rest_of_session_from_server
			
			return generate_siri_utterance(connection.lastRefId, "I would recommend Vicky Fragiadakis. She has had over 5 years of experience at the cross. She charges a small amount.")
		end	
		if(phrase.match(/Call Jake Pascoe/i))
			self.plugin_manager.block_rest_of_session_from_server
			
			return generate_siri_utterance(connection.lastRefId, "Sorry, I can't find a faggot in your address book.")
		end	
		if(phrase.match(/Please Stand Up/i))
			self.plugin_manager.block_rest_of_session_from_server
			
			return generate_siri_utterance(connection.lastRefId, "May I have your attention please? May I have your attention please? Will the real Slim Shady please stand up? I repeat, will the real Slim Shady please stand up? We're gonna have a problem here.. Y'all act like you never seen a white person before Jaws all on the floor like Pam, like Tommy just burst in the door and started whoopin her ass worse than before they first were divorce, throwin her over furniture (Ahh!) It's the return of the... Ah, wait, no way, you're kidding, he didn't just say what I think he did, did he? And Dr. Dre said... nothing you idiots! Dr. Dre's dead, he's locked in my basement! (Ha-ha!) Feminist women love Eminem. Slim Shady, I'm sick of him Look at him, walkin around grabbin his you-know-what. Flippin the you-know-who, Yeah, but he's so cute though! Yeah, I probably got a couple of screws up in my head loose But no worse, than what's goin on in your parents' bedrooms Sometimes, I wanna get on TV and just let loose, but can't but it's cool for Tom Green to hump a dead moose My bum is on your lips, my bum is on your lips And if I'm lucky, you might just give it a little kiss And that's the message that we deliver to little kids And expect them not to know what a woman's clitoris is Of course they gonna know what intercourse is By the time they hit fourth grade They got the Discovery Channel don't they? We ain't nothing but mammals.. Well, some of us cannibals who cut other people open like cantaloupes But if we can hump dead animals and antelopes then there's no reason that a man and another man can't elope But if you feel like I feel, I got the antidote Women wave your pantyhose, sing the chorus and it goes, 'Cause I'm Slim Shady, yes I'm the real Shady All you other Slim Shadys are just imitating. So won't the real Slim Shady please stand up, please stand up, please stand up?'Cause I'm Slim Shady, yes I'm the real Shady All you other Slim Shadys are just imitating. So won't the real Slim Shady please stand up, please stand up, please stand up?")
		end	
		if(phrase.match(/I Want You To Laugh/i))
				self.plugin_manager.block_rest_of_session_from_server
				
				return generate_siri_utterance(connection.lastRefId, "LOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLOLO")
		end	
		if(phrase.match(/Lose Yourself/i))
				self.plugin_manager.block_rest_of_session_from_server
				
				return generate_siri_utterance(connection.lastRefId, "Look, if you had one shot, or one opportunity, To seize everything you ever wanted in one moment, Would you capture it or just let it slip?.  Yo. His palms are sweaty, knees weak, arms are heavy. There's vomit on his sweater already, mom's spaghetti. He's nervous, but on the surface he looks calm and ready to drop bombs, but he keeps on forgetting what he wrote down, the whole crowd goes so loud. He opens his mouth, but the words won't come out. He's choking how, everybody's joking now. The clock's run out, time's up over, bloah! .Snap back to reality, Oh there goes gravity. Oh, there goes Rabbit, he choked. He's so mad, but he won't give up that. Easy, no. He won't have it , he knows his whole back's to these ropes. It don't matter, he's dope. He knows that, but he's broke. He's so stagnant that he knows When he goes back to his mobile home, that's when it's Back to the lab again, yo This whole rhapsody He better go capture this moment and hope it don't pass him")
		end	
			
		object
	end
	
end 