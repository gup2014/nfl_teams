NFL Teams
=======================

How to use
-------------------------------------------------------------------------------
This plugin has a shortcode with parameters to show the NFL teams wherever you want.

The basic usage for the plugin is [nfl_teams].

1.- Filters
-------------------------------------------------------------------------------
You can filter the data by default or using custom fields in the view.

* division. To filter by division. Values: All (default), North, South, East, West
* conference. To filter by conference. Values: All (default), National_Football_Conference, American_Football_Conference

If you don't want to show the filter, add a parameter with the value No as following:
* filter. Show or not the filter. Values: Yes (default), No

Examples:

	[nfl_teams]
    [nfl_teams division=North]
    [nfl_teams conference=National_Football_Conference]
    [nfl_teams conference=National_Football_Conference division=North]
    [nfl_teams conference=National_Football_Conference division=North filter=No]

If you don't want to show the filter, add a parameter with the value No as following:
* filter. Show or not the filter. You can see a filter bar on the top of the list. Values: Yes (default), No

Examples:

    [nfl_teams filter=No]


2.- Order by
-------------------------------------------------------------------------------
You can order the data by default or using custom fields in the view.
* order. To show the data ordered by id or not. Values: No (Default), Asc, Desc

Examples:

    [nfl_teams order=Asc]
    [nfl_teams order=Desc]