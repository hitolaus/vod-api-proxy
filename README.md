vod-api-proxy
=============

Scrape different VOD providers websites/APIs and present the data in an unified API

# Providers

X-Providers=youbio,hbo_dk,netflix_dk

# Endpoints

/
-> [{ id: 'movies', type: 'container' }]

/movies

-> [{ id: 'all'} ]

# Build instructions

Requires 'phing', 'PHPUnit'

    $ phing

