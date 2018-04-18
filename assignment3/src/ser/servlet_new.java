package ser;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import javax.servlet.ServletConfig;

import java.sql.*;

/**
 * Servlet implementation class servlet_new
 */
@WebServlet("/servlet_new")
public class servlet_new extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public servlet_new() {
        super();
        // TODO Auto-generated constructor stub
    }
    
    public void init(ServletConfig config) throws ServletException {
		// TODO Auto-generated method stub
		//String msg="Hello World";
	}
    
    protected void service(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
    	//response.sendRedirect("home.jsp");
		doGet(request,response);
		
	}
	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html");
		//PrintWriter out=response.getWriter();
		HttpSession session=request.getSession();
		
		String uname=request.getParameter("uname");
		String pass=request.getParameter("pass");
		
		Connection con=null;
	
		try{
			Class.forName("com.mysql.jdbc.Driver");
			con=DriverManager.getConnection("jdbc:mysql://localhost:3306/te","root","root");
			
			Statement st=con.createStatement();
			ResultSet rs=st.executeQuery("select * from login;");
			while(rs.next())
			{
				
			  String u=rs.getString(1);
			  String p=rs.getString(2);
			  if(u.equals(uname) && p.equals(pass))
			  {
				  //System.out.println("equal");
				  session.setAttribute("uname",uname);
				  response.getWriter().println(uname);
				response.sendRedirect("home.jsp");
			
			  }
			 
			  
			}
			
			
		}catch (Exception e) {
			// TODO: handle exception
		}}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
