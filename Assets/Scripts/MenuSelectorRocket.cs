using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MenuSelectorRocket : MonoBehaviour
{
    public static float xPos;
    public static bool GameStart;

    private Vector2 targetPos;
    void Update()
    {

        if (MenuSelector.GameStart)
        {
            targetPos = new Vector2(10, -2);
            transform.position = Vector2.MoveTowards(transform.position, targetPos, 20 * Time.deltaTime);
        }
        else
        {
            targetPos = new Vector2(MenuSelector.xPos, -2);
            transform.position = Vector2.MoveTowards(transform.position, targetPos, 100 * Time.deltaTime);
        }

    }
}

