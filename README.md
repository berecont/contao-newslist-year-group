# contao-newslist-year-group
## News nach Jahr gruppieren  

Im Frontendmodul `Nachrichtenliste` wird zwischen den Nachrichten je Jahr eine Jahresüberschrift eingefügt.  
In Verwendung ist der `parseArticles` Hook:  
Dabei wird jedes erste Item eines Jahres mit einer flag markiert und geben das Jahr mit. Im `news_latest.html.twig` wird die Variable `yearStart` bereit gestellt. Damit kann abgefragt werden, ob ein flag gesetzt ist. Falls ja, wird die Überschrift ausgegeben.
