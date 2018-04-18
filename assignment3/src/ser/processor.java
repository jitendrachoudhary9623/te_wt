package ser;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.mysql.jdbc.Connection;

/**
 * Servlet implementation class processor
 */
@WebServlet("/processor")
public class processor extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see Servlet#init(ServletConfig)
	 */
	public void init(ServletConfig config) throws ServletException {
		// TODO Auto-generated method stub
	}

	/**
	 * @see Servlet#destroy()
	 */
	public void destroy() {
		// TODO Auto-generated method stub
	}

	/**
	 * @see HttpServlet#service(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void service(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
	doGet(request,response);
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("Served at: ").append(request.getContextPath());
	PrintWriter out = response.getWriter();
	response.setContentType("text/html");
	String uname=request.getParameter("uname");
	String pass=request.getParameter("pass");
	try {
		Class.forName("com.mysql.jdbc.Driver");
		java.sql.Connection con=null;
		con=DriverManager.getConnection("jdbc:mysql://localhost:3306/te", "root", "root");
		Statement st=con.createStatement();
		ResultSet rs=st.executeQuery("Select * from login");
		boolean flag=false;
		while(rs.next())
		{
			String u=rs.getString(1);
			String p = rs.getString(2);
			if(uname.equals(u)&pass.equals(p))
				{
				flag=true;
				break;
				}
		}
	if(flag==true)
	{
	//	request.setAttribute("uname", uname);
		HttpSession session=request.getSession();
		session.setAttribute("uname", uname);
		response.sendRedirect("Welcome.jsp");
	}
	} catch (ClassNotFoundException | SQLException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}
	
	
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
