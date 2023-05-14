import java.sql.*;

public class GymRegistrationForm {

    private Connection conn;

    public GymRegistrationForm() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver"); // Charger le pilote JDBC MySQL
            this.conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/salle_de_sport", "gerome", "Mdpmysql123");
        } catch (SQLException | ClassNotFoundException e) {
            e.printStackTrace();
        }
    }

    public void addClient(String firstName, String lastName, String email) throws SQLException {
        String query = "INSERT INTO utilisateur (nom, prenom, email) VALUES (?, ?, ?)";
        PreparedStatement stmt = conn.prepareStatement(query);
        stmt.setString(1, firstName);
        stmt.setString(2, lastName);
        stmt.setString(3, email);
        stmt.executeUpdate();
    }
}