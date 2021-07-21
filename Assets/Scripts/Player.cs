using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class Player : MonoBehaviour
{
    public int health = 3;
    public int coinsCount;
    public static int Coins;
    private Vector3 mousePosition;
    public float moveSpeed;
    public Text healthDisplay;
    public Text coinDisplay;

    private void Update()
    {
        healthDisplay.text = "Health: " + health.ToString();
        coinDisplay.text = "Coins: " + coinsCount.ToString();
        Coins = coinsCount;

        if (health <= 0)
        {
            Vector2 targetPos = new Vector2(-15, -15);
            transform.position = Vector2.MoveTowards(transform.position, targetPos, 50 * Time.deltaTime);
            Cursor.visible = true;
            Invoke("GameOver", .5f);
        }
        else
        {
            mousePosition = Input.mousePosition;
            mousePosition = Camera.main.ScreenToWorldPoint(mousePosition);
            if (mousePosition.x > -9.2 && mousePosition.x < 9.2 && mousePosition.y > -4.75 && mousePosition.y < 4.75)
            {
                transform.position = Vector2.Lerp(transform.position, mousePosition, moveSpeed);
            }
        }
    }
    void GameOver()
    {
        SceneManager.LoadScene("GameOver");
    }
}
