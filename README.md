# Description


## General

- We want to scrape the freelancer list on gulp.de. The script should go to gulp.de, 
login with given credentials, being logged in open 
this page: https://www.gulp.de/direkt/app/experten and scrape the list + details

- to setup, run: `composer install`. You need PHP 7.3 and probably some extensions (composer install will tell you what's missing)

- afterwards, you should be able to run the command `php ./bin/console scraper:get-all-freelancer`. This doesn't do
anything yet, but should be extended to scrape the freelancer details.

- I've added TODO comments on the classes that need to be extended


## Goal

The result should be a json file being generated for each freelancer in the following format.
I added a screenshot of the Profile that would result in this example json, so you can have
a look which information is listed where. You can find it under `example-freelancer.png`.

```
{
    "userId": "5e32c27ab1e29551e29c8c39",
    "image": "https://www.gulp.de/gulp2/assets/freelancer/542bce0be4b05f1122ce9ed4/1412156944146/image.png",
    "title": "Business Analyst / Scrum Master / PMO / Projekt Manager / Interim Manager",
    "availability": {
        "from": "2020-02-17"
    },
    "price": {
        "type": "hourly", // always hourly
        "amount": 107,
    },
    "countries": ["Deutschland", "Schweiz"]
    "areas": {
        "zipcodes": ["D3", "D6", "D7"],
        "surroundings:" {
            "city": "Frankfurt am Main",
            "distance": 300
        }
    },
    "projects: [
        // one example, add one of these blocks for each project
        {
            "from": "2018-01",
            "to": "2018-12",
            "title": "SIRIUS - Outsourcing der Wertpapierabwicklung und Reporting an HSBC Transaction Services GmbH",
            "role": "Business Analyst",
            "tags": ["Kanban", "Oracle/SQL"],
            "products": ["Oracle SQL Developer", "HPQC"]
            "customer": "Commerzbank AG",
            "city": "Frankfurt am Main",
            "description": "Überprüfung der Anforderungen der Product Owner (...)
        }  
    ],
    "languages": ["deutsch", "englisch"],
    "tags": [
        "Agile Methoden", "IBM Mainframe", "Access", ... (just all tags under "Kompetenzen)
    ]
}
  
```