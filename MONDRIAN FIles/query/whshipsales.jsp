<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/dwadv_k11c?user=root&password=" catalogUri="/WEB-INF/queries/whshipsales.xml">

select {[Measures].[Ship Count]} ON COLUMNS,
  {([Time].[All Times],[Ship_Method],[Sales_Territory].[All Territory])} ON ROWS 
from [ShipSales]



</jp:mondrianQuery>



<c:set var="title01" scope="session">Query AdventureWorks Ship Sales using Mondrian OLAP</c:set>
