<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/dwadv_k11c?user=root&password=" catalogUri="/WEB-INF/queries/whsales.xml">

select {[Measures].[Terjual QTY],[Measures].[Total Pemasukan]} ON COLUMNS,
  {([Time].[All Times],[Sales_Territory].[All Territory],[Customer],[Sales_Person],[Ship_Method],
    [Product].[All Products])} ON ROWS 
from [Sales]



</jp:mondrianQuery>



<c:set var="title01" scope="session">Query AdventureWorks Sales using Mondrian OLAP</c:set>
