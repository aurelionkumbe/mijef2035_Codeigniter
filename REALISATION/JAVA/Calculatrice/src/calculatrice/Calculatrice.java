/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package calculatrice;

import Outils.lookandfeel.LookAndFeelManager;


/**
 *
 * @author nkaurelien
 */
public class Calculatrice {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {         
        LookAndFeelManager.lookAsSystem();
        new gui.Calculatrice().setVisible(true);
    }
    
    
    
}
