/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Outils.lookandfeel;

import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;
import javax.swing.plaf.metal.*;

/**
 *
 * @author nkaurelien
 */
public class LookAndFeelManager {

    // Specify the look and feel to use by defining the LOOKANDFEEL constant
    // Valid values are: null (use the default), "Metal", "System", "Motif",
    // and "GTK"
    static String LOOKANDFEEL = "Metal";

    // If you choose the Metal L&F, you can also choose a theme.
    // Specify the theme to use by defining the THEME constant
    // Valid values are: "DefaultMetal", "Ocean",  and "Test"
    static String THEME = "Test";

    public static void initLookAndFeel() {
        initLookAndFeel(null, null);
    }

    public static void lookAsSystem() {
        initLookAndFeel("System", null);
    }
    public static void lookAsGTK() {
        initLookAndFeel("GTK", null);
    }
    public static void lookAsMotif() {
        initLookAndFeel("Motif", null);
    }

    /**
     *
     * @param theme = DefaultMetal ou Ocean ou null pour le theme test
     */
    public static void lookAsMetal(String theme) {
        initLookAndFeel("Metal", theme);
    }

    private static void initLookAndFeel(String look, String theme) {
        String lookAndFeel = null;
        LOOKANDFEEL = look;
        THEME = theme;
        if (LOOKANDFEEL != null) {
            if (LOOKANDFEEL.equals("Metal")) {
                lookAndFeel = UIManager.getCrossPlatformLookAndFeelClassName();
                //  an alternative way to set the Metal L&F is to replace the 
                // previous line with:
                // lookAndFeel = "javax.swing.plaf.metal.MetalLookAndFeel";

            } else if (LOOKANDFEEL.equals("System")) {
                lookAndFeel = UIManager.getSystemLookAndFeelClassName();
            } else if (LOOKANDFEEL.equals("Motif")) {
                lookAndFeel = "com.sun.java.swing.plaf.motif.MotifLookAndFeel";
            } else if (LOOKANDFEEL.equals("GTK")) {
                lookAndFeel = "com.sun.java.swing.plaf.gtk.GTKLookAndFeel";
            } else {
                System.err.println("Unexpected value of LOOKANDFEEL specified: "
                        + LOOKANDFEEL);
                lookAndFeel = UIManager.getCrossPlatformLookAndFeelClassName();
            }

            try {

                UIManager.setLookAndFeel(lookAndFeel);

                // If L&F = "Metal", set the theme
                if (LOOKANDFEEL.equals("Metal")) {
                    if (THEME.equals("DefaultMetal")) {
                        MetalLookAndFeel.setCurrentTheme(new DefaultMetalTheme());
                    } else if (THEME.equals("Ocean")) {
                        MetalLookAndFeel.setCurrentTheme(new OceanTheme());
                    } else {
                        MetalLookAndFeel.setCurrentTheme(new TestTheme());
                    }

                    UIManager.setLookAndFeel(new MetalLookAndFeel());
                }

            } catch (ClassNotFoundException e) {
                System.err.println("Couldn't find class for specified look and feel:"
                        + lookAndFeel);
                System.err.println("Did you include the L&F library in the class path?");
                System.err.println("Using the default look and feel.");
            } catch (UnsupportedLookAndFeelException e) {
                System.err.println("Can't use the specified look and feel ("
                        + lookAndFeel
                        + ") on this platform.");
                System.err.println("Using the default look and feel.");
            } catch (Exception e) {
                System.err.println("Couldn't get specified look and feel ("
                        + lookAndFeel
                        + "), for some reason.");
                System.err.println("Using the default look and feel.");
                e.printStackTrace();
            }
        }
    }

}
