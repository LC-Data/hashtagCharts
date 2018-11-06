#!/usr/bin/env python

import tweepy
import json
#import jsonpickle
import sys

def main():
	auth = tweepy.OAuthHandler('####################', '#####################################');
	auth.set_access_token('###############################', '##############################');

	api = tweepy.API(auth);

	firstSearchTerm = sys.argv[1];
	secondSearchTerm = sys.argv[2];

	class tweetObject():
		
		def __init__(self, author, text):
			self.author = author
			self.text = text


	search = api.search(q= firstSearchTerm, count = 100, lang='en');
	totalFound = 0;
	for tweet in search:

		words = tweet.text.lower().encode("utf-8").split();
		for x in words:
			if x.lower() == firstSearchTerm.lower():
				totalFound = totalFound + 1;


	search2 = api.search(q= secondSearchTerm, count = 100, lang='en');
	totalFound2 = 0;
	for tweet2 in search2:
		words = tweet2.text.lower().encode("utf-8").split();
		for x in words:
			if x.lower() == secondSearchTerm.lower():
				totalFound2 = totalFound2 + 1;

	#print "Content-Type: text/html"
	#print "" #use this double quote print statement to add a blank line in the script

	print(json.dumps(totalFound));	#first search term
	print(json.dumps(totalFound2));	#second


main();