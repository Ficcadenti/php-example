<hmtl>
  <head>
    <title>PCRE tabella n2</title>
  </head>
  <body>
    <table cellspacing="0" cellpadding="0">
      <col width="109" />
      <col width="617" />
      <tr>
        <td width="109"><strong>Esempio </strong></td>
        <td width="617"><strong>Descrizione</strong></td>
      </tr>
      <tr>
        <td>&lsquo;/hello/&rsquo; </td>
        <td width="617">corrisponde alla parola ciao</td>
      </tr>
      <tr>
        <td>&lsquo;/^hello/&rsquo; </td>
        <td width="617">corrisponde a tutte le stringhe   con hello all&rsquo;inizio della stringa. Possibili corrispondenze sono hello o   helloworld, ma non worldhello</td>
      </tr>
      <tr>
        <td>&lsquo;/hello$/&rsquo; </td>
        <td width="617">corrisponde a tutte le stringhe   con hello alla fine della stringa.</td>
      </tr>
      <tr>
        <td>&lsquo;/he.o/&rsquo; </td>
        <td width="617">corrisponde a tutte le stringhe   con he, un carattere qualsiasi, e la o finale. Quindi possibili   corrispondenze sono helo, heyo, hebo ma non hello (con due L)</td>
      </tr>
      <tr>
        <td>&lsquo;/he?llo/&rsquo; </td>
        <td width="617">Esso sarà soddisfatta llo o   hello</td>
      </tr>
      <tr>
        <td>&lsquo;/hello+/&rsquo; </td>
        <td width="617">corrisponde alla stringa hello o   più occorrenze della stringa, quindi ad esempio hello o hellohello</td>
      </tr>
      <tr>
        <td>&lsquo;/he*llo/&rsquo; </td>
        <td width="617">corrisponde alle stringhe llo,   hello o hehello , ma non hellooo</td>
      </tr>
      <tr>
        <td>&lsquo;/hello|world/&rsquo; </td>
        <td width="617">corrisponde alle stringhe hello   oppure world</td>
      </tr>
      <tr>
        <td>&lsquo;/(A-Z)/&rsquo; </td>
        <td width="617">in questo modo, corrisponde alla   sequenza di caratteri da A a Z (maiuscoli). Quindi A,B,C,D,…,Z</td>
      </tr>
      <tr>
        <td>&lsquo;/[abc]/&rsquo; </td>
        <td width="617">rappresenta una classe e   corrisponde alle stringhe che contengono almeno uno dei caratteri specificati   tra [], senza contare l&rsquo;ordine in cui sono stati scritti</td>
      </tr>
      <tr>
        <td>&lsquo;/[A-Z]/&rsquo; </td>
        <td width="617">corrisponde alle stringhe che   contengono almeno uno dei caratteri da A a Z (minuscoli)</td>
      </tr>
      <tr>
        <td>&lsquo;/abc{1}/&rsquo; </td>
        <td width="617">in questo caso le parentesi   graffe si applicano all&rsquo;ultimo carattere. Corrisponde alla stringa abc con   solo un&rsquo;occorrenza di c alla fine. Esempio: abc, ma non abcc</td>
      </tr>
      <tr>
        <td>&lsquo;/abc{1,}/&rsquo; </td>
        <td width="617">corrisponde alle stringhe che   iniziano per ab e finiscono per uno o più occorrenze di c. Ad esempio,   corrisponde a abc o abcc</td>
      </tr>
      <tr>
        <td>&lsquo;/abc{2,4}/&rsquo; </td>
        <td width="617">corrisponde alle stringhe che   iniziano per ab e finiscono con occorrenze di c (tra due e quattro) dopo i   caratteri ab . Ad esempio, abcc, abccc o abcccc , ma non abc.</td>
      </tr>
      <tr>
        <td>&lsquo;/[0-9]/&rsquo; </td>
        <td width="617">corrisponde alle stringhe che   contengono uno qualsiasi dei numeri compresi nell&rsquo;intervallo;</td>
      </tr>
    </table>
  </body>
</html>