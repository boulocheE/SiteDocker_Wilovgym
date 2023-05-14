import javax.swing.*;
import java.awt.event.*;
import java.sql.SQLException;

public class GymRegistrationFormGUI extends JFrame implements ActionListener {
    // Définition des différents éléments de l'IHM
    private JLabel title, firstNameLabel, lastNameLabel, emailLabel;
    private JTextField firstNameText, lastNameText, emailText;
    private JButton submitButton, resetButton;
    private GymRegistrationForm gymRegistrationForm;
    
    public GymRegistrationFormGUI() {
        // Création de l'objet GymRegistrationForm pour ajouter les clients dans la base de données
        gymRegistrationForm = new GymRegistrationForm();

        this.setDefaultCloseOperation(EXIT_ON_CLOSE);
        
        // Configuration de la fenêtre principale
        setTitle("Formulaire d'inscription à la salle de sport");
        setSize(500, 300);
        setLayout(null);

        // Ajout du label de titre
        title = new JLabel("Formulaire d'inscription");
        title.setBounds(180, 20, 200, 20);
        add(title);

        // Ajout du label et du champ pour le prénom
        firstNameLabel = new JLabel("Prénom :");
        firstNameLabel.setBounds(50, 60, 100, 20);
        add(firstNameLabel);
        firstNameText = new JTextField();
        firstNameText.setBounds(160, 60, 200, 20);
        add(firstNameText);

        // Ajout du label et du champ pour le nom de famille
        lastNameLabel = new JLabel("Nom de famille :");
        lastNameLabel.setBounds(50, 100, 100, 20);
        add(lastNameLabel);
        lastNameText = new JTextField();
        lastNameText.setBounds(160, 100, 200, 20);
        add(lastNameText);

        // Ajout du label et du champ pour l'adresse e-mail
        emailLabel = new JLabel("Adresse e-mail :");
        emailLabel.setBounds(50, 140, 100, 20);
        add(emailLabel);
        emailText = new JTextField();
        emailText.setBounds(160, 140, 200, 20);
        add(emailText);

        // Ajout des boutons pour soumettre ou réinitialiser le formulaire
        submitButton = new JButton("Soumettre");
        submitButton.setBounds(110, 200, 100, 20);
        submitButton.addActionListener(this);
        add(submitButton);

        resetButton = new JButton("Réinitialiser");
        resetButton.setBounds(250, 200, 100, 20);
        resetButton.addActionListener(this);
        add(resetButton);

        // Affichage de la fenêtre
        setVisible(true);
    }

    // Méthode pour afficher l'IHM
    public void displayForm() 
    {
        setVisible(true);
    }
    

    // Implémentation de la méthode actionPerformed pour gérer les événements des boutons
    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == submitButton) {
            // Récupération des données du formulaire
            String firstName = firstNameText.getText();
            String lastName = lastNameText.getText();
            String email = emailText.getText();

            // Ajout du client dans la base de données
            try {
                gymRegistrationForm.addClient(firstName, lastName, email);
            } catch (SQLException e1) {
                e1.printStackTrace();
            }

            // Affichage d'un message de confirmation
            JOptionPane.showMessageDialog(this, "Le client a été ajouté avec succès !");
        } else if (e.getSource() == resetButton) {
            // Réinitialisation des champs du formulaire
            firstNameText.setText("");
            lastNameText.setText("");
            emailText.setText("");
        }
    }

    public static void main(String[] args) {
        new GymRegistrationFormGUI();
    }
}
